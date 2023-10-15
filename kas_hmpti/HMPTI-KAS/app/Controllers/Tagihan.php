<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MemberModel;
use App\Models\TagihanModel;

class Tagihan extends BaseController
{
    protected $TagihanModel;
    protected $MemberModel;

    public function __construct()
    {
        $this->TagihanModel = new TagihanModel();
        $this->MemberModel = new MemberModel();
    }

    public function index()
    {
        return view('tagihan/v_index', [
            'title' => "Daftar Tagihan Kas",
            'subtitle' => "",
            'tagihan' => $this->TagihanModel->getTagihan()
        ]);
    }

    public function modalTambah()
    {
        if ($this->request->isAJAX()) {
            $json = [
                'data' => view('/tagihan/modaltambah')
            ];
            echo json_encode($json);
        } else {
            exit("Tidak dapat diproses !");
        }
    }

    public function modalEdit()
    {
        if ($this->request->isAJAX()) {
            $cariTagihan = $this->TagihanModel->find($this->request->getPost('id'));
            if ($cariTagihan) {
                $json = [
                    'data' => view('/tagihan/modaledit', [
                        'tagihan' => $cariTagihan
                    ])
                ];
            } else {
                $json = [
                    'error' => "Tagihan tidak ada di sistem"
                ];
            }
            echo json_encode($json);
        } else {
            exit("Tidak dapat diproses !");
        }
    }

    public function simpanTagihan()
    {
        if ($this->request->isAJAX()) {
            $valid = $this->validate([
                'tgl_tagihan' => [
                    'label' => 'Tanggal tagihan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'nominal' => [
                    'label' => 'Nominal tagihan',
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'numeric' => '{field} harus angka'
                    ]
                ]
            ]);

            $validation = \Config\Services::validation();

            if ($valid) {
                $input = [
                    'tgl_tagihan' => $this->request->getPost('tgl_tagihan'),
                    'nominal' => $this->request->getPost('nominal'),
                    'keterangan' => $this->request->getPost('keterangan'),
                    'id_bendahara' => session('LoginBendahara')['id_bendahara'],
                ];
                try {
                    $this->TagihanModel->insert($input);
                    $json = [
                        'success' => "Tagihan berhasil ditambahkan"
                    ];
                } catch (\Throwable $th) {
                    $json = [
                        'error' => "Terdapat kesalahan pada sistem"
                    ];
                }
            } else {
                $json = [
                    'errors' => [
                        'error_tgl_tagihan' => $validation->getError('tgl_tagihan'),
                        'error_nominal' => $validation->getError('nominal'),
                    ]
                ];
            }
            echo json_encode($json);
        } else {
            exit("Tidak dapat diproses !");
        }
    }

    public function ubahTagihan()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('id');
            $cekTagihan = $this->TagihanModel->find($id);
            if ($cekTagihan) {
                $valid = $this->validate([
                    'tgl_tagihan' => [
                        'label' => 'Tanggal tagihan',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                        ]
                    ],
                    'nominal' => [
                        'label' => 'Nominal tagihan',
                        'rules' => 'required|numeric',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong',
                            'numeric' => '{field} harus angka'
                        ]
                    ]
                ]);

                $validation = \Config\Services::validation();

                if ($valid) {
                    $input = [
                        'tgl_tagihan' => $this->request->getPost('tgl_tagihan'),
                        'nominal' => $this->request->getPost('nominal'),
                        'keterangan' => $this->request->getPost('keterangan'),
                        'id_bendahara' => session('LoginBendahara')['id_bendahara'],
                    ];
                    try {
                        $this->TagihanModel->update($id, $input);
                        $json = [
                            'success' => "Tagihan berhasil diubah"
                        ];
                    } catch (\Throwable $th) {
                        $json = [
                            'error' => "Terdapat kesalahan pada sistem"
                        ];
                    }
                } else {
                    $json = [
                        'errors' => [
                            'error_tgl_tagihan' => $validation->getError('tgl_tagihan'),
                            'error_nominal' => $validation->getError('nominal'),
                        ]
                    ];
                }
            } else {
                $json = [
                    'error' => "Tagihan tidak ada di sistem"
                ];
            }
            echo json_encode($json);
        } else {
            exit("Tidak dapat diproses !");
        }
    }

    public function hapusTagihan()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('id');
            try {
                $this->TagihanModel->delete($id);
                $json = [
                    'success' => 'Tagihan berhasil dihapus'
                ];
            } catch (\Throwable $th) {
                $json = [
                    'error' => 'Tagihan tidak dapat dihapus !'
                ];
            }
            echo json_encode($json);
        } else {
            exit("Tidak dapat diproses !");
        }
    }

    public function detail($id)
    {
        $cekTagihan = $this->TagihanModel->getTagihan($id);
        if ($cekTagihan) {
            return view('tagihan/detail', [
                'tagihan' => $cekTagihan,
                'title' => "Daftar Tagihan Kas",
                'subtitle' => "Detail Tagihan Kas",
            ]);
        } else {
            session()->setFlashdata('msg', 'error#Tagihan tidak ditemukan');
            return redirect()->to(base_url('/tagihan'));
        }
    }

    public function data_member()
    {
        if ($this->request->isAJAX()) {
            $cek_status = $this->request->getPost('cek_status');
            $id_tagihan = $this->request->getPost('id_tagihan');
            // cek status untuk pecarian member kas
            // 1 = artinya yang belum bayar
            // 2 = yang sudah bayar
            if ($cek_status == 1 || $cek_status == 2) {
                $json = [
                    'data' => view('tagihan/data_member', [
                        'member' => $this->MemberModel->getMemberCekTagihan($cek_status, $id_tagihan),
                        'id_tagihan' => $id_tagihan
                    ])
                ];
            } else {
                $json = [
                    'data' => view('tagihan/data_member', [
                        'member' => $this->MemberModel->getMemberAktif(),
                        'id_tagihan' => $id_tagihan
                    ])
                ];
            }

            echo json_encode($json);
        } else {
            exit("Tidak dapat diproses !");
        }
    }
}
