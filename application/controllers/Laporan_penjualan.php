<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan_penjualan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Laporan_penjualan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'laporan_penjualan?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'laporan_penjualan?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'laporan_penjualan';
            $config['first_url'] = base_url() . 'laporan_penjualan';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Laporan_penjualan_model->total_rows($q);
        $laporan_penjualan = $this->Laporan_penjualan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'laporan_penjualan_data' => $laporan_penjualan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Laporan Penjualan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Laporan Penjualan' => '',
        ];

        $data['page'] = 'laporan_penjualan/laporan_penjualan_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id) 
    {
        $row = $this->Laporan_penjualan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'tanggal' => $row->tanggal,
		'tiket_terjual' => $row->tiket_terjual,
	    );
        $data['title'] = 'Laporan Penjualan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'laporan_penjualan/laporan_penjualan_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('laporan_penjualan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('laporan_penjualan/create_action'),
	    'tanggal' => set_value('tanggal'),
	    'tiket_terjual' => set_value('tiket_terjual'),
	);
        $data['title'] = 'Laporan Penjualan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'laporan_penjualan/laporan_penjualan_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tanggal' => $this->input->post('tanggal',TRUE),
		'tiket_terjual' => $this->input->post('tiket_terjual',TRUE),
	    );

            $this->Laporan_penjualan_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('laporan_penjualan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Laporan_penjualan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('laporan_penjualan/update_action'),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'tiket_terjual' => set_value('tiket_terjual', $row->tiket_terjual),
	    );
            $data['title'] = 'Laporan Penjualan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'laporan_penjualan/laporan_penjualan_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('laporan_penjualan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'tanggal' => $this->input->post('tanggal',TRUE),
		'tiket_terjual' => $this->input->post('tiket_terjual',TRUE),
	    );

            $this->Laporan_penjualan_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('laporan_penjualan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Laporan_penjualan_model->get_by_id($id);

        if ($row) {
            $this->Laporan_penjualan_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('laporan_penjualan'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('laporan_penjualan'));
        }
    }

    public function deletebulk(){
        $delete = $this->Laporan_penjualan_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('success', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('tiket_terjual', 'tiket terjual', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "laporan_penjualan.xls";
        $judul = "laporan_penjualan";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
	xlsWriteLabel($tablehead, $kolomhead++, "Tiket Terjual");

	foreach ($this->Laporan_penjualan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tiket_terjual);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=laporan_penjualan.doc");

        $data = array(
            'laporan_penjualan_data' => $this->Laporan_penjualan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('laporan_penjualan/laporan_penjualan_doc',$data);
    }

  public function printdoc(){
        $data = array(
            'laporan_penjualan_data' => $this->Laporan_penjualan_model->get_all(),
            'start' => 0
        );
        $this->load->view('laporan_penjualan/laporan_penjualan_print', $data);
    }

}

/* End of file Laporan_penjualan.php */
/* Location: ./application/controllers/Laporan_penjualan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-10 18:27:40 */
/* http://harviacode.com */