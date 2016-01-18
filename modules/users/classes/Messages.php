<?php
/**
 * Description of Messages
 *
 * @author MARTIN
 */
class Messages {
    
    public static function getMessage($param) {
        if(!isset($param['r']) || !isset($param['r'])){
            return '';
        }else if($param['r'] == '0' && isset($param['op'])){
            return 'La operacion no ha podido realizarse';
        }else if($param['r'] == '1' && $param['op'] == 'delete'){
            return 'Usuario borrado';
        }else if($param['r'] == '1' && $param['op'] == 'update'){
            return 'Usuario Actualizado';
        }else if($param['r'] == '1' && $param['op'] == 'lock'){
            return 'Usuario bloqueado';
        }else if($param['r'] == '1' && $param['op'] == 'unlock'){
            return 'Usuario desbloqueado';
        }else if($param['r'] == '1' && $param['op'] == 'delete'){
            return 'Usuario borrado';
        }
    }
}
