<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukModel;

class ProdukController extends BaseController
{
    protected $produkModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
    }

    public function index()
    {
        $data = [
            'listProduk' => $this->produkModel->findAll()
        ];

        return view('produk', $data);
    }

    public function insert()
    {
        $data = [
            'nama_produk' => $this->request->getVar('nama_produk'),
            'keterangan' => $this->request->getVar('keterangan'),
            'harga' => $this->request->getVar('harga'),
            'jumlah' => $this->request->getVar('jumlah'),
        ];

        $this->produkModel->insert($data);
        return redirect()->to('/')->with('success', 'Insert data berhasil');
    }

    public function update($id)
    {
        $data = [
            'nama_produk' => $this->request->getVar('nama_produk'),
            'keterangan' => $this->request->getVar('keterangan'),
            'harga' => $this->request->getVar('harga'),
            'jumlah' => $this->request->getVar('jumlah'),
        ];

        $this->produkModel->update($id, $data);

        return redirect()->to('/')->with('success', 'Update data berhasil');
    }

    public function delete($id)
    {
        $this->produkModel->delete($id);

        return redirect()->to('/')->with('success', 'Delete data berhasil');
    }
}
