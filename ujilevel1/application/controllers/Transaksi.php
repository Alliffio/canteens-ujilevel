<?php
class Transaksi extends CI_Controller{
    public function __construct(){                                            
        parent::__construct();
        $this->load->model('model_system');
    }

    public function inputOrder()
    {
        $tableorder = 'order';
        $tabledetailorder = 'detail_order';
        $tabletransaksi = 'transaksi';

        $idproduct = $_POST['product_id'];
        $totalprice = $_POST['total_price'];
        $qtyproduct = $_POST['product_qty'];

        $iduser = $this->input->post('id_user');

        $dataorder = array(
            'id_user' => $iduser,
            'status_order' => 'menunggu',
        );

        $this->db->set('tanggal','NOW()',FALSE);

        $this->model_system->insertTable($tableorder, $dataorder);

        $whereorder = array(
            'id_user' => $iduser, 
            'status_order' => 'menunggu',
        );

        $idorder = $this->model_system->readColumnTable($tableorder, $whereorder)->id_order;

        $datadetailorder = array();
        $index = 0;
        foreach ($idproduct as $productid) {
            array_push($datadetailorder, array(
                'id_order' => $idorder,
                'id_masakan' => $productid,
                'kuantitas' => $qtyproduct[$index],
            ));
            $index++;
        }

        $this->model_system->insertBatchTable($tabledetailorder, $datadetailorder);

        $datatransaksi = array(
            'id_user' => $iduser,
            'id_order' => $idorder,
            'total_bayar' => $totalprice,
        );

        $this->db->set('tanggal','NOW()',FALSE);

        $this->model_system->insertTable($tabletransaksi, $datatransaksi);

        redirect('dashboard/belanja');
    }
}
?>