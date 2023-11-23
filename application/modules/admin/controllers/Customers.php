<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        verify_session('admin');

        $this->load->model(array(
            'customer_model' => 'customer',
            'order_model' => 'order',
            'payment_model' => 'payment'
        ));
    }

    public function index()
    {
        $params['title'] = 'Kelola Customers';

        $this->load->view('header', $params);
        $this->load->view('customers/customers');
        $this->load->view('footer');
    }

    public function view($id = 0)
    {
        if ( $this->customer->is_customer_exist($id))
        {
            $data = $this->customer->customer_data($id);

            $params['title'] = $data->name;

            $customer['customer'] = $data;
            $customer['flash'] = $this->session->flashdata('customer_flash');
            $customer['orders'] = $this->order->order_by($id);
            $customer['payments'] = $this->payment->payment_by($id);

            $this->load->view('header', $params);
            $this->load->view('customers/view', $customer);
            $this->load->view('footer');
        }
        else
        {
            show_404();
        }
    }

    public function edit($id = 0)
    {

    }

    public function api($action = '')
    {
        switch ($action)
        {
            case 'customers' :
                $customers = $this->customer->get_all_customers();

                $n = 0;
                foreach ($customers as $customer)
                {
                    $customers[$n]->profile_picture = base_url('assets/uploads/users/'. $customer->profile_picture);

                    $n++;
                }

                $customers['data'] = $customers;

                $response = $customers;
            break;
            case 'delete' :
                $id = $this->input->post('id');

                $this->customer->delete_customer($id);

                $response = array('code' => 204);
            break;
        }

        $response = json_encode($response);
        $this->output->set_content_type('application/json')
            ->set_output($response);
    }

    // public function api_delete() {
    //     $this->load->model('Customers_model'); // Gantilah 'Customers_model' dengan nama model yang sesuai
        
    //     // Ambil ID pelanggan dari data yang dikirimkan melalui POST
    //     $customer_id = $this->input->post('id');

    //     // Cek apakah ID pelanggan valid
    //     if ($customer_id) {
    //         // Panggil model untuk melakukan penghapusan data
    //         $delete_result = $this->Customers_model->delete_customer($customer_id);

    //         if ($delete_result) {
    //             // Jika penghapusan berhasil, kirim respon sukses
    //             $response['code'] = 204; // kode 204 menunjukkan penghapusan sukses
    //         } else {
    //             // Jika terjadi kesalahan saat penghapusan, kirim respon gagal
    //             $response['code'] = 500; // kode 500 menunjukkan kesalahan server
    //             $response['message'] = 'Gagal menghapus pelanggan.';
    //         }
    //     } else {
    //         // Jika ID pelanggan tidak valid, kirim respon gagal
    //         $response['code'] = 400; // kode 400 menunjukkan permintaan yang tidak valid
    //         $response['message'] = 'ID pelanggan tidak valid.';
    //     }

    //     // Mengembalikan respon dalam format JSON
    //     $this->output
    //         ->set_content_type('application/json')
    //         ->set_output(json_encode($response));
    // }
}