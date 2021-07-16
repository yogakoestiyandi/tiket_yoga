<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detail_pemesanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Detail_pemesanan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'detail_pemesanan?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'detail_pemesanan?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'detail_pemesanan';
            $config['first_url'] = base_url() . 'detail_pemesanan';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Detail_pemesanan_model->total_rows($q);
        $detail_pemesanan = $this->Detail_pemesanan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'detail_pemesanan_data' => $detail_pemesanan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Detail Pemesanan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Detail Pemesanan' => '',
        ];

        $data['page'] = 'detail_pemesanan/detail_pemesanan_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id) 
    {
        $row = $this->Detail_pemesanan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_detail_pemesanan' => $row->id_detail_pemesanan,
		'id_jadwal' => $row->id_jadwal,
		'id_oemesanan' => $row->id_oemesanan,
		'nama' => $row->nama,
		'nomor_hp' => $row->nomor_hp,
		'jenis_kelamin' => $row->jenis_kelamin,
	    );
        $data['title'] = 'Detail Pemesanan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'detail_pemesanan/detail_pemesanan_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('detail_pemesanan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('detail_pemesanan/create_action'),
	    'id_detail_pemesanan' => set_value('id_detail_pemesanan'),
	    'id_jadwal' => set_value('id_jadwal'),
	    'id_oemesanan' => set_value('id_oemesanan'),
	    'nama' => set_value('nama'),
	    'nomor_hp' => set_value('nomor_hp'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	);
        $data['title'] = 'Detail Pemesanan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'detail_pemesanan/detail_pemesanan_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_jadwal' => $this->input->post('id_jadwal',TRUE),
		'id_oemesanan' => $this->input->post('id_oemesanan',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'nomor_hp' => $this->input->post('nomor_hp',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
	    );

            $this->Detail_pemesanan_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('detail_pemesanan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Detail_pemesanan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('detail_pemesanan/update_action'),
		'id_detail_pemesanan' => set_value('id_detail_pemesanan', $row->id_detail_pemesanan),
		'id_jadwal' => set_value('id_jadwal', $row->id_jadwal),
		'id_oemesanan' => set_value('id_oemesanan', $row->id_oemesanan),
		'nama' => set_value('nama', $row->nama),
		'nomor_hp' => set_value('nomor_hp', $row->nomor_hp),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
	    );
            $data['title'] = 'Detail Pemesanan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'detail_pemesanan/detail_pemesanan_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('detail_pemesanan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_detail_pemesanan', TRUE));
        } else {
            $data = array(
		'id_jadwal' => $this->input->post('id_jadwal',TRUE),
		'id_oemesanan' => $this->input->post('id_oemesanan',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'nomor_hp' => $this->input->post('nomor_hp',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
	    );

            $this->Detail_pemesanan_model->update($this->input->post('id_detail_pemesanan', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('detail_pemesanan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Detail_pemesanan_model->get_by_id($id);

        if ($row) {
            $this->Detail_pemesanan_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('detail_pemesanan'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('detail_pemesanan'));
        }
    }

    public function deletebulk(){
        $delete = $this->Detail_pemesanan_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('success', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('id_jadwal', 'id jadwal', 'trim|required');
	$this->form_validation->set_rules('id_oemesanan', 'id oemesanan', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('nomor_hp', 'nomor hp', 'trim|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');

	$this->form_validation->set_rules('id_detail_pemesanan', 'id_detail_pemesanan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Detail_pemesanan.php */
/* Location: ./application/controllers/Detail_pemesanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-06-29 10:53:58 */
/* http://harviacode.com */