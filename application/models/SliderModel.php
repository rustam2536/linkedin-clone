<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SliderModel extends CI_Model {

  public function addContent($h,$data)
  {
    $this->db->insert($h,$data);
    $lastId=$this->db->insert_id();
    return $lastId;
  }

  public function getContent()
  {
    $yh = $this->db->get('cmanage');
    $lastId = $yh->result();
    return $lastId;
  }

  public function gethm()
  {
    $yh = $this->db->where('section','services')->get('cmanage');
    $lastId = $yh->result();
    return $lastId;
  }

  public function getabt()
  {
    $yh = $this->db->where('navbar','about')->get('cmanage');
    $lastId = $yh->result();
    return $lastId;
  }

  public function getprtf()
  {
    $yh = $this->db->where('navbar','portfolio')->get('cmanage');
    $lastId = $yh->result();
    return $lastId;
  }

  public function gettm()
  {
    $yh = $this->db->where('navbar','team')->get('cmanage');
    $lastId = $yh->result();
    return $lastId;
  }

  public function getclient()
  {
    $yh = $this->db->where('navbar','home')->where('section','client')->get('cmanage');
    $lastId = $yh->result();
    return $lastId;
  }


  public function getData()
  {
    $gy=$this->db->get('slider');
    $row=$gy->result();
    return $row;
  }

  public function getView(){
    $gy=$this->db->where('status','1')->get('slider');
    $row=$gy->result();
    return $row; 
  }

   // public function aboutus()
  // {
  //   $gy=$this->db->get('about');
  //   $row=$gy->result();
  //   return $row;
  // }

  public function getAdmin($email,$pwd)
  {
    $user=$this->db->where('email',$email)->where('password',$pwd)->get('admin');
    $row=$user->result();
    return $row;
  }
  
  public function getUserDetail($id)
  {
    $user=$this->db->where('status',1)->where('id',$id)->get('user');
    $row=$user->result();
    return $row;
  }

  public function deleteRow($rid)
  {
     $this->db->where('id',$rid);
     $this->db->delete('slider');
  }

  public function deleteCon($rid)
  {
     $this->db->where('id',$rid);
     $this->db->delete('cmanage');
  }
 
  public function status_update($rid,$mode){

    $this->db->where('id', $rid);
    $this->db->update('slider',$mode); 
  }

  public function statusUpdt($rid,$mode){

    $this->db->where('id', $rid);
    $this->db->update('cmanage',$mode); 
  }

  public function updateSlider($data,$id)
  {
     $this->db->where('id',$id);
     $this->db->update('slider',$data);
  }

  public function updateConte($data,$id)
  {
     $this->db->where('id',$id);
     $this->db->update('cmanage',$data);
  }

  public function getContentDetail($id)
  {
    $user=$this->db->where('id',$id)->get('cmanage');
    $row=$user->result();
    return $row;
  }

  public function getSliderDetail($id)
  {
    $user=$this->db->where('id',$id)->get('slider');
    $row=$user->result();
    return $row;
  }

}