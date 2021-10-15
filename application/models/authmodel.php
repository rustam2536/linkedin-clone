
    <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class AuthModel extends CI_Model {
      
      public function getData()
      {
        $user=$this->db->get('admin');
        $row=$user->result();
        return $row;
      }
    
      public function getAdmin($email,$password)
      {
        $user=$this->db->where('email',$email)->where('password',$password)->get('admin');
        $row=$user->result();
        return $row;
      }
    
    }
?>
