<?php

/**
 * Description of User
 *
 * @author MARTIN
 */
class User {

    private $email, $password, $alias, $dischargeDate, $active, $administrator, $personal;

    //(si no es administrador sólo puede crear usuarios normales no personal) 
    function __construct($email = NULL, $password = NULL, $alias = NULL, $dischargeDate = NULL, $active = NULL, $administrator = NULL, $personal = NULL) {
        $this->email = $email;
        $this->password = $password;
        $this->alias = $alias;
        $this->dischargeDate = $dischargeDate;
        $this->active = $active;
        $this->administrator = $administrator;
        $this->personal = $personal;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getAlias() {
        return $this->alias;
    }

    public function getDischargeDate() {
        return $this->dischargeDate;
    }

    public function getActive() {
        return $this->active;
    }

    public function getAdministrator() {
        return $this->administrator;
    }

    public function getPersonal() {
        return $this->personal;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setAlias($alias) {
        $this->alias = $alias;
    }

    public function setDischargeDate($dischargeDate) {
        $this->dischargeDate = $dischargeDate;
    }

    public function setActive($active) {
        $this->active = $active;
    }

    public function setAdministrator($administrator) {
        $this->administrator = $administrator;
    }

    public function setPersonal($personal) {
        $this->personal = $personal;
    }

    function set($param) {
        foreach ($this as $key => $value) {
            if (isset($param[$key])) {
                $this->$key = $param[$key];
            }
        }
    }

    function get() {
        $param = array();
        foreach ($this as $key => $value) {
            $param[$key] = $value;
        }
        return $param;
    }

}
