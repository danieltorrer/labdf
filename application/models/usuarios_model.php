<?php

class usuarios_model extends CI_Model {

    function contar($sexo){
        if ($sexo == "ambos") {
            $query = $this->db->count_all("usuario");  
            return $query; //->result_array();  
        }
        else{
            $this->db->where('sexo', $sexo);
            $query=$this->db->count_all_results('usuario');
            return $query; //->result_array();
        }
    }

    function delegacion($sexo){
        if ($sexo == "ambos") {
            $query = $this->db->select("delegacion, COUNT(delegacion) AS count", false)
            ->from("usuario")
            ->group_by("usuario.delegacion")
            ->order_by("count","desc")
            ->limit(20)
            ->get()->result();
            
            return $query;
        }
        else{
            $query = $this->db->select("delegacion, COUNT(delegacion) AS count", false)
            ->from("usuario")
            ->where("sexo", $sexo)
            ->group_by("delegacion")
            ->order_by("count","desc")
            ->limit(20)
            ->get()->result();
             return $query;
        }
    }

    /*
    function get_blog(){
        $this->db->order_by("Fecha","desc");
        $this->db->select('Id_Articulo,Titulo');
        $this->db->where('Estado',2);
        $query = $this->db->get('c2_entradas');
        return $query->result_array();
    }

    function count_pendientes(){
        $this->db->where('Estado',1);
        $query=$this->db->count_all_results('c2_entradas');
        return $query;
    }

    function get_pendientes(){
        $this->db->where('Estado',1);
        $query = $this->db->get('c2_entradas');
        return $query->result_array();
    }

    function get_entrada($id){
        $query = $this->db->get_where('c2_entradas', array('Id_Articulo' => $id));
        return $query->result_array();
    }

    function get_entradas_user($id){
        $this->db->order_by("Fecha","desc");
        $query = $this->db->get_where('c2_entradas', array('Autor' => $id));
        return $query->result_array();
    }

    function add_entrada(){
        $titulo = $this->security->xss_clean($this->input->post('Titulo'));
        $cuerpo = $this->security->xss_clean($this->input->post('Cuerpo'));
        $catego = $this->security->xss_clean($this->input->post('Tipo'));
        $config['upload_path'] = './sites/default/files/blog';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width']  = '2000';
        $config['max_height']  = '2000';
        $config['remove_spaces']=true;
        $config['encrypt_name']=true;
        $this->load->library('upload', $config);
        $subida= array('upload_data'=>$this->upload->data());
        if ( ! $this->upload->do_upload()){
            $error = array('error' => $this->upload->display_errors());
            $msg= '<font color=red>Error al cambiar la imagen.</font><br />';
            $this->session->set_flashdata('errors',$msg);
        }
        else{
            $msg= '<font color=green>Imagen cambiada de manera exitosa.</font><br />';
            $subida= array('upload_data'=>$this->upload->data());
            $data = array(
                'Titulo' => $titulo,
                'Autor' => $this->session->userdata('uid'),
                'Cuerpo' => $cuerpo,
                'Fecha' => time(),
                'Tipo' => $catego,
                'Imagen'=>$subida["upload_data"]["file_name"], //"files/blog/".
                'Estado' => 1,
                );
            $this->session->set_flashdata('errors',$msg);
            $this->db->insert('c2_entradas', $data);
        }
    }
    
    public function get_autor($id){
        $this->db->where('Id_Articulo',$id);
        $query = $this->db->get('c2_entradas');
        return $query->result_array();
    }

    public function editar_entrada(){
        $this->check_isvalidated();
        $this->check_iseditor();
        $this->load->model("blog_model");
        $id = $this->uri->segment(3);
        $data["resultado"] = $this->blog_model->get_entrada($id);
        $this->load->view("editor_entrada_view",$data);
    }
    public function revisar(){
        $this->check_isvalidated();
        $this->check_iseditor();
        $this->load->model("blog_model");
        $data["resultado"] = $this->blog_model->revisar_entrada();
        redirect('editor/');
    }


    function normal_revisar_entrada(){
        $Id = $this->security->xss_clean($this->input->post("Id"));
        $Titulo= $this->security->xss_clean($this->input->post("Titulo"));
        $Cuerpo= $this->security->xss_clean($this->input->post("Cuerpo"));
        $Tipo = $this->security->xss_clean($this->input->post("Tipo"));
        $this->check_is_writer($Id);
        $update = array(
            'Titulo' => $Titulo,
            'Cuerpo' => $Cuerpo,
            'Tipo'=>$Tipo,
            'Estado'=>1
            );
        $msg= '<font color=green>Entrada Revisada.</font><br />';
        $this->db->where("Id_Articulo", $Id);
        $this->db->update("c2_entradas", $update);
        return true;
    }


    function revisar_entrada(){
        $Id = $this->security->xss_clean($this->input->post("Id"));
        $Titulo= $this->security->xss_clean($this->input->post("Titulo"));
        $Cuerpo= $this->security->xss_clean($this->input->post("Cuerpo"));
        $Estado= $this->security->xss_clean($this->input->post("status-entrada"));
        $Tipo = $this->security->xss_clean($this->input->post("Tipo"));
        $Comentario = $this->security->xss_clean($this->input->post("Comentario"));
        $update = array(
            'Titulo' => $Titulo,
            'Cuerpo' => $Cuerpo,
            'Estado' =>$Estado,
            'Tipo'=>$Tipo,
            'Comentario'=>$Comentario
            );
        $msg= '<font color=green>Entrada Revisada.</font><br />';
        $this->db->where("Id_Articulo", $Id);
        $this->db->update("c2_entradas", $update);
        return true;
    }

    function get_last_post(){
        $this->db->where('Estado',2);
        $this->db->order_by("Fecha","desc");
        $query = $this->db->get('c2_entradas', 5);
        return $query->result_array();
    }

    private function check_is_writer($entrada){
        $this->load->model("blog_model");  
        $result=$this->blog_model->get_autor($entrada);
        $autor=$result[0]["Autor"];
        if ($this->session->userdata('uid')!=$autor){
            $msg= '<font color=orange>Necesitas ser el autor para poder editar esta entrada.</font><br />';
            $this->session->set_flashdata('errors',$msg);
            redirect('dashboard');    
        }
        return($autor);
    }

    public function contar_entradas(){
        $this->db->where('Estado',2);
        return $this->db->count_all("c2_entradas");
    }

    function obtener_10_entradas($limit, $start){
        $this->db->order_by("Fecha","desc");
        //$this->db->select('Id_Articulo,Titulo',"imagen"); 
        $this->db->where('Estado',2);
        $query = $this->db->get('c2_entradas',$limit,$start);
        return $query->result_array();
    }

    public function get_related($tipo){
        $this->db->order_by("Fecha","desc");
        //$this->db->select('Id_Articulo,Titulo',"imagen");
        $this->db->where('Tipo', $tipo);
        $this->db->where('Estado',2);
        $query = $this->db->get('c2_entradas', 4);
        return $query->result_array();
    }
    */
}
?>