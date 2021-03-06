define({ "api": [
  {
    "type": "post",
    "url": "/Derajatcidera/delete",
    "title": "hapus derajat cidera",
    "version": "0.1.0",
    "name": "DeleteDerajatcidera",
    "group": "Derajatcidera",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "id_derajat_cidera",
            "description": "<p>id derajat cidera yang akan di hapus</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>success</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Derajatcidera.php",
    "groupTitle": "Derajatcidera"
  },
  {
    "type": "get",
    "url": "/Derajatcidera/",
    "title": "Request semua data derajat cidera",
    "version": "0.1.0",
    "name": "GetDerajatcidera",
    "group": "Derajatcidera",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "data",
            "description": "<p>berisi data derajat cidera</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.id_derajat_cidera",
            "description": "<p>id derajat cidera</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nama",
            "description": "<p>nama derajat cidera</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.keterangan",
            "description": "<p>keterangan derajat cidera</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.min_nilai",
            "description": "<p>min nilai derajat cidera</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.max_nilai",
            "description": "<p>max nilai derajat cidera</p>"
          },
          {
            "group": "Success 200",
            "type": "Char",
            "optional": false,
            "field": "data.isactive",
            "description": "<p>status aktif (y) atau non aktif (n)</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "data.created",
            "description": "<p>waktu saat input data</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.createdby",
            "description": "<p>id user yang melakukan input data</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "data.updated",
            "description": "<p>waktu saat edit data</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.updatedby",
            "description": "<p>id user yang melakukan edit data</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.no",
            "description": "<p>nomor urut data</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.action",
            "description": "<p>tombol edit dan delete</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Derajatcidera.php",
    "groupTitle": "Derajatcidera"
  },
  {
    "type": "get",
    "url": "/Derajatcidera/:id",
    "title": "Request data derajat cidera berdasarkan id",
    "version": "0.1.0",
    "name": "GetDerajatcideraById",
    "group": "Derajatcidera",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "data",
            "description": "<p>berisi data derajat cidera</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.id_derajat_cidera",
            "description": "<p>id derajat cidera</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nama",
            "description": "<p>nama derajat cidera</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.keterangan",
            "description": "<p>keterangan derajat cidera</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.min_nilai",
            "description": "<p>min nilai derajat cidera</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.max_nilai",
            "description": "<p>max nilai derajat cidera</p>"
          },
          {
            "group": "Success 200",
            "type": "Char",
            "optional": false,
            "field": "data.isactive",
            "description": "<p>status aktif (y) atau non aktif (n)</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "data.created",
            "description": "<p>waktu saat input data</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.createdby",
            "description": "<p>id user yang melakukan input data</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "data.updated",
            "description": "<p>waktu saat edit data</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.updatedby",
            "description": "<p>id user yang melakukan edit data</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.no",
            "description": "<p>nomor urut data</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.action",
            "description": "<p>tombol edit dan delete</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Derajatcidera.php",
    "groupTitle": "Derajatcidera"
  },
  {
    "type": "post",
    "url": "/Derajatcidera/insert",
    "title": "Create derajat cidera",
    "version": "0.1.0",
    "name": "PostDerajatcidera",
    "group": "Derajatcidera",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "nama",
            "description": "<p>nama derajat cidera</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "keterangan",
            "description": "<p>keterangan derajat cidera</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "min_nilai",
            "description": "<p>min nilai derajat cidera</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "max_nilai",
            "description": "<p>max nilai derajat cidera</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>success</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Derajatcidera.php",
    "groupTitle": "Derajatcidera"
  },
  {
    "type": "post",
    "url": "/Derajatcidera/update",
    "title": "update derajat cidera",
    "version": "0.1.0",
    "name": "UpdateDerajatcidera",
    "group": "Derajatcidera",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "id_derajat_cidera",
            "description": "<p>id derajat cidera yang akan di update</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "nama",
            "description": "<p>nama derajat cidera</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "keterangan",
            "description": "<p>keterangan derajat cidera</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "min_nilai",
            "description": "<p>min nilai derajat cidera</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "max_nilai",
            "description": "<p>max nilai derajat cidera</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>success</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Derajatcidera.php",
    "groupTitle": "Derajatcidera"
  },
  {
    "type": "post",
    "url": "/Dokter/approve",
    "title": "approve dokter",
    "version": "0.1.0",
    "name": "ApproveDokter",
    "group": "Dokter",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "id_dokter",
            "description": "<p>id dokter</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "isapprove",
            "description": "<p>y = aprove, n = reject</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>success</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Dokter.php",
    "groupTitle": "Dokter"
  },
  {
    "type": "post",
    "url": "/Dokter/delete",
    "title": "hapus data dokter",
    "version": "0.1.0",
    "name": "DeleteDokter",
    "group": "Dokter",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "id_dokter",
            "description": "<p>id dokter yang akan dihapus</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>success</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Dokter.php",
    "groupTitle": "Dokter"
  },
  {
    "type": "get",
    "url": "/Dokter/",
    "title": "Request semua data dokter",
    "version": "0.1.0",
    "name": "GetDokter",
    "group": "Dokter",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "data",
            "description": "<p>berisi data dokter</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.id_dokter",
            "description": "<p>id dokter</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nama",
            "description": "<p>nama dokter</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.username",
            "description": "<p>username dokter</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.password",
            "description": "<p>password dokter</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.id_rumahsakit",
            "description": "<p>id rumah sakit</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nama_rs",
            "description": "<p>nama rumah sakit</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.alamat",
            "description": "<p>alamat rumah sakit</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.telepon",
            "description": "<p>nomor telepon rumah sakit</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.isapprove",
            "description": "<p>y = sudah disetujui , n = belum disetujui</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.no",
            "description": "<p>nomor urut data</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.action",
            "description": "<p>tombol edit dan delete</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Dokter.php",
    "groupTitle": "Dokter"
  },
  {
    "type": "get",
    "url": "/Dokter/:id",
    "title": "Request data dokter by id",
    "version": "0.1.0",
    "name": "GetDokterById",
    "group": "Dokter",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "data",
            "description": "<p>berisi data dokter</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.id_dokter",
            "description": "<p>id dokter</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nama",
            "description": "<p>nama dokter</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.username",
            "description": "<p>username dokter</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.password",
            "description": "<p>password dokter</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.id_rumahsakit",
            "description": "<p>id rumah sakit</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nama_rs",
            "description": "<p>nama rumah sakit</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.alamat",
            "description": "<p>alamat rumah sakit</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.telepon",
            "description": "<p>nomor telepon rumah sakit</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.isapprove",
            "description": "<p>y = sudah disetujui , n = belum disetujui</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Dokter.php",
    "groupTitle": "Dokter"
  },
  {
    "type": "get",
    "url": "/Dokter/pasien/:id",
    "title": "get data dokter by id pasien",
    "version": "0.1.0",
    "name": "GetDokterPasien",
    "group": "Dokter",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>success</p>"
          },
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "data",
            "description": "<p>berisi data dokter</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.id_dokter",
            "description": "<p>id dokter</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nama_dokter",
            "description": "<p>nama dokter</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.foto",
            "description": "<p>foto</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nama_rumahsakit",
            "description": "<p>nama rumahsakit</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.alamat",
            "description": "<p>alamat rumah sakit</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.telepon",
            "description": "<p>telepon rumah sakit</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Dokter.php",
    "groupTitle": "Dokter"
  },
  {
    "type": "post",
    "url": "/Dokter/insert",
    "title": "Create dokter",
    "version": "0.1.0",
    "name": "PostDokter",
    "group": "Dokter",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "nama",
            "description": "<p>nama dokter</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "username",
            "description": "<p>username dokter</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>email dokter</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>password dokter</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "id_rumahsakit",
            "description": "<p>id rumah sakit</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>success</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "pesan",
            "description": "<p>pesan</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Dokter.php",
    "groupTitle": "Dokter"
  },
  {
    "type": "post",
    "url": "/Dokter/update",
    "title": "update data dokter",
    "version": "0.1.0",
    "name": "UpdateDokter",
    "group": "Dokter",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "id_dokter",
            "description": "<p>id dokter</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "nama",
            "description": "<p>nama dokter</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "username",
            "description": "<p>username dokter</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>email dokter</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>password dokter</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "id_rumahsakit",
            "description": "<p>id rumah sakit</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>success</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "pesan",
            "description": "<p>pesan</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Dokter.php",
    "groupTitle": "Dokter"
  },
  {
    "type": "post",
    "url": "/Dokter/upload/",
    "title": "upload foto dokter",
    "version": "0.1.0",
    "name": "UploadFotoDokter",
    "group": "Dokter",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "File",
            "optional": false,
            "field": "file",
            "description": "<p>file foto dokter</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "id",
            "description": "<p>id dokter</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>success</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Dokter.php",
    "groupTitle": "Dokter"
  },
  {
    "type": "post",
    "url": "/Kriteria/delete",
    "title": "hapus grading",
    "version": "0.1.0",
    "name": "DeleteGrading",
    "group": "Grading",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "id_kriteria",
            "description": "<p>id kriteria yang akan di hapus</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>success</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Kriteria.php",
    "groupTitle": "Grading"
  },
  {
    "type": "post",
    "url": "/Grading/delete",
    "title": "hapus grading",
    "version": "0.1.0",
    "name": "DeleteGrading",
    "group": "Grading",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "id_grading",
            "description": "<p>id grading yang akan di hapus</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>success</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Grading.php",
    "groupTitle": "Grading"
  },
  {
    "type": "get",
    "url": "/Grading/",
    "title": "Request semua data grading",
    "version": "0.1.0",
    "name": "GetGrading",
    "group": "Grading",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "data",
            "description": "<p>berisi data grading</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.id",
            "description": "<p>id grading</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nama_grading",
            "description": "<p>nama grading</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.nilai",
            "description": "<p>nilai grading</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.urut",
            "description": "<p>urutan grading</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nama_parameter",
            "description": "<p>nama parameter</p>"
          },
          {
            "group": "Success 200",
            "type": "Char",
            "optional": false,
            "field": "data.isactive",
            "description": "<p>status aktif (y) atau non aktif (n)</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "data.created",
            "description": "<p>waktu saat input data</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.createdby",
            "description": "<p>id user yang melakukan input data</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "data.updated",
            "description": "<p>waktu saat edit data</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.updatedby",
            "description": "<p>id user yang melakukan edit data</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.no",
            "description": "<p>nomor urut data</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.action",
            "description": "<p>tombol edit dan delete</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Grading.php",
    "groupTitle": "Grading"
  },
  {
    "type": "get",
    "url": "/Grading/:id",
    "title": "Request data grading berdasarkan id",
    "version": "0.1.0",
    "name": "GetGradingById",
    "group": "Grading",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "data",
            "description": "<p>berisi data grading</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.id",
            "description": "<p>id grading</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nama_grading",
            "description": "<p>nama grading</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.nilai",
            "description": "<p>nilai grading</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.urut",
            "description": "<p>urutan grading</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nama_parameter",
            "description": "<p>nama parameter</p>"
          },
          {
            "group": "Success 200",
            "type": "Char",
            "optional": false,
            "field": "data.isactive",
            "description": "<p>status aktif (y) atau non aktif (n)</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "data.created",
            "description": "<p>waktu saat input data</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.createdby",
            "description": "<p>id user yang melakukan input data</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "data.updated",
            "description": "<p>waktu saat edit data</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.updatedby",
            "description": "<p>id user yang melakukan edit data</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.no",
            "description": "<p>nomor urut data</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.action",
            "description": "<p>tombol edit dan delete</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Grading.php",
    "groupTitle": "Grading"
  },
  {
    "type": "post",
    "url": "/Grading/insert",
    "title": "Create grading",
    "version": "0.1.0",
    "name": "PostGrading",
    "group": "Grading",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "nama",
            "description": "<p>nama grading</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "nilai",
            "description": "<p>nilai grading</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "urut",
            "description": "<p>urut grading</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "id_parameter",
            "description": "<p>id parameter</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>success</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Grading.php",
    "groupTitle": "Grading"
  },
  {
    "type": "post",
    "url": "/Grading/update",
    "title": "update grading",
    "version": "0.1.0",
    "name": "UpdateGrading",
    "group": "Grading",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "id_grading",
            "description": "<p>id grading yang akan di update</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "nama",
            "description": "<p>nama grading</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "nilai",
            "description": "<p>nilai grading</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "urut",
            "description": "<p>urut grading</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "id_parameter",
            "description": "<p>id parameter</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>success</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Grading.php",
    "groupTitle": "Grading"
  },
  {
    "type": "get",
    "url": "/Kriteria/",
    "title": "Request semua data kriteria",
    "version": "0.1.0",
    "name": "GetKriteria",
    "group": "Kriteria",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "data",
            "description": "<p>berisi data kriteria</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.id",
            "description": "<p>id kriteria</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nama",
            "description": "<p>nama kriteria</p>"
          },
          {
            "group": "Success 200",
            "type": "Char",
            "optional": false,
            "field": "data.isactive",
            "description": "<p>status aktif (y) atau non aktif (n)</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "data.created",
            "description": "<p>waktu saat input data</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.createdby",
            "description": "<p>id user yang melakukan input data</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "data.updated",
            "description": "<p>waktu saat edit data</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.updatedby",
            "description": "<p>id user yang melakukan edit data</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.no",
            "description": "<p>nomor urut data</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.action",
            "description": "<p>tombol edit dan delete</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Kriteria.php",
    "groupTitle": "Kriteria"
  },
  {
    "type": "get",
    "url": "/Kriteria/:id",
    "title": "Request data kriteria berdasarkan id",
    "version": "0.1.0",
    "name": "GetKriteriaById",
    "group": "Kriteria",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "data",
            "description": "<p>berisi data kriteria</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.id",
            "description": "<p>id kriteria</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nama",
            "description": "<p>nama kriteria</p>"
          },
          {
            "group": "Success 200",
            "type": "Char",
            "optional": false,
            "field": "data.isactive",
            "description": "<p>status aktif (y) atau non aktif (n)</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "data.created",
            "description": "<p>waktu saat input data</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.createdby",
            "description": "<p>id user yang melakukan input data</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "data.updated",
            "description": "<p>waktu saat edit data</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.updatedby",
            "description": "<p>id user yang melakukan edit data</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.no",
            "description": "<p>nomor urut data</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.action",
            "description": "<p>tombol edit dan delete</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Kriteria.php",
    "groupTitle": "Kriteria"
  },
  {
    "type": "post",
    "url": "/Kriteria/insert",
    "title": "Create kriteria",
    "version": "0.1.0",
    "name": "PostKriteria",
    "group": "Kriteria",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "nama",
            "description": "<p>nama kriteria</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>success</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Kriteria.php",
    "groupTitle": "Kriteria"
  },
  {
    "type": "post",
    "url": "/Kriteria/update",
    "title": "update kriteria",
    "version": "0.1.0",
    "name": "UpdateKriteria",
    "group": "Kriteria",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "id_kriteria",
            "description": "<p>id kriteria yang akan di update</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "nama",
            "description": "<p>nama kriteria</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>success</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Kriteria.php",
    "groupTitle": "Kriteria"
  },
  {
    "type": "post",
    "url": "/Parameter/delete",
    "title": "hapus parameter",
    "version": "0.1.0",
    "name": "DeleteParameter",
    "group": "Parameter",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "id_parameter",
            "description": "<p>id parameter yang akan dihapus</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>success</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Parameter.php",
    "groupTitle": "Parameter"
  },
  {
    "type": "get",
    "url": "/Parameter/",
    "title": "Request semua data parameter",
    "version": "0.1.0",
    "name": "GetParameter",
    "group": "Parameter",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "data",
            "description": "<p>berisi data parameter</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.id",
            "description": "<p>id parameter</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nama_parameter",
            "description": "<p>nama parameter</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nama_kriteria",
            "description": "<p>nama kriteria</p>"
          },
          {
            "group": "Success 200",
            "type": "Char",
            "optional": false,
            "field": "data.isactive",
            "description": "<p>status aktif (y) atau non aktif (n)</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "data.created",
            "description": "<p>waktu saat input data</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.createdby",
            "description": "<p>id user yang melakukan input data</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "data.updated",
            "description": "<p>waktu saat edit data</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.updatedby",
            "description": "<p>id user yang melakukan edit data</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.no",
            "description": "<p>nomor urut data</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.action",
            "description": "<p>tombol edit dan delete</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Parameter.php",
    "groupTitle": "Parameter"
  },
  {
    "type": "get",
    "url": "/Parameter/:id",
    "title": "Request data parameter berdasarkan id",
    "version": "0.1.0",
    "name": "GetParameterById",
    "group": "Parameter",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "data",
            "description": "<p>berisi data parameter</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.id",
            "description": "<p>id parameter</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nama_parameter",
            "description": "<p>nama parameter</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nama_kriteria",
            "description": "<p>nama kriteria</p>"
          },
          {
            "group": "Success 200",
            "type": "Char",
            "optional": false,
            "field": "data.isactive",
            "description": "<p>status aktif (y) atau non aktif (n)</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "data.created",
            "description": "<p>waktu saat input data</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.createdby",
            "description": "<p>id user yang melakukan input data</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "data.updated",
            "description": "<p>waktu saat edit data</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.updatedby",
            "description": "<p>id user yang melakukan edit data</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.no",
            "description": "<p>nomor urut data</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.action",
            "description": "<p>tombol edit dan delete</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Parameter.php",
    "groupTitle": "Parameter"
  },
  {
    "type": "post",
    "url": "/Parameter/insert",
    "title": "Create parameter",
    "version": "0.1.0",
    "name": "PostParameter",
    "group": "Parameter",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "nama",
            "description": "<p>nama parameter</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "id_kriteria",
            "description": "<p>id kriteria</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>success</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Parameter.php",
    "groupTitle": "Parameter"
  },
  {
    "type": "post",
    "url": "/Parameter/update",
    "title": "update parameter",
    "version": "0.1.0",
    "name": "UpdateParameter",
    "group": "Parameter",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "id_parameter",
            "description": "<p>id parameter yang akan di update</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "nama",
            "description": "<p>nama parameter</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "id_kriteria",
            "description": "<p>id kriteria</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>success</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Parameter.php",
    "groupTitle": "Parameter"
  },
  {
    "type": "post",
    "url": "/Pasien/delete",
    "title": "hapus data pasien",
    "version": "0.1.0",
    "name": "DeletePasien",
    "group": "Pasien",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "id_pasien",
            "description": "<p>id pasien yang akan dihapus</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>success</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Pasien.php",
    "groupTitle": "Pasien"
  },
  {
    "type": "get",
    "url": "/Pasien/",
    "title": "Request semua data pasien",
    "version": "0.1.0",
    "name": "GetPasien",
    "group": "Pasien",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "data",
            "description": "<p>berisi data pasien</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.id_pasien",
            "description": "<p>id pasien</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nama",
            "description": "<p>nama pasien</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.username",
            "description": "<p>username pasien</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.password",
            "description": "<p>password pasien</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.tanggal_lahir",
            "description": "<p>tanggal lahir pasien (yyyy-mm-dd)</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.gender",
            "description": "<p>jenis kelamin pasien (l = laki-laki, p = perempuan)</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.id_dokter",
            "description": "<p>id dokter</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nama_dokter",
            "description": "<p>nama dokter</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.no",
            "description": "<p>nomor urut data</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.action",
            "description": "<p>tombol edit dan delete</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Pasien.php",
    "groupTitle": "Pasien"
  },
  {
    "type": "get",
    "url": "/Pasien/:id",
    "title": "Request semua data pasien",
    "version": "0.1.0",
    "name": "GetPasienById",
    "group": "Pasien",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "data",
            "description": "<p>berisi data pasien</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.id_pasien",
            "description": "<p>id pasien</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nama",
            "description": "<p>nama pasien</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.username",
            "description": "<p>username pasien</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.password",
            "description": "<p>password pasien</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.tanggal_lahir",
            "description": "<p>tanggal lahir pasien (yyyy-mm-dd)</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.gender",
            "description": "<p>jenis kelamin pasien (l = laki-laki, p = perempuan)</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.id_dokter",
            "description": "<p>id dokter</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nama_dokter",
            "description": "<p>nama dokter</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Pasien.php",
    "groupTitle": "Pasien"
  },
  {
    "type": "get",
    "url": "/Pasien/dokter/:id",
    "title": "get data pasien by id dokter",
    "version": "0.1.0",
    "name": "GetPasienDokter",
    "group": "Pasien",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>success</p>"
          },
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "data",
            "description": "<p>berisi data pasien</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.id_pasien",
            "description": "<p>id pasien</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nama",
            "description": "<p>nama pasien</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.tanggal_lahir",
            "description": "<p>tanggal lahir pasien (yyyy-mm-dd)</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.gender",
            "description": "<p>jenis kelamin pasien (l = laki-laki, p = perempuan)</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.foto",
            "description": "<p>foto pasien</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.id_dokter",
            "description": "<p>id dokter</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nama_dokter",
            "description": "<p>nama dokter</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.usia",
            "description": "<p>usia pasien</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Pasien.php",
    "groupTitle": "Pasien"
  },
  {
    "type": "post",
    "url": "/Pasien/insert",
    "title": "Create pasien",
    "version": "0.1.0",
    "name": "PostPasien",
    "group": "Pasien",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "nama",
            "description": "<p>nama pasien</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "username",
            "description": "<p>username pasien</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>email pasien</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>password pasien</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "tanggal_lahir",
            "description": "<p>tanggal lahir pasien (yyyy-mm-dd)</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "data.gender",
            "description": "<p>jenis kelamin pasien (l = laki-laki, p = perempuan)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "data.id_dokter",
            "description": "<p>id dokter</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>success</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "pesan",
            "description": "<p>pesan</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Pasien.php",
    "groupTitle": "Pasien"
  },
  {
    "type": "post",
    "url": "/Pasien/update",
    "title": "update data pasien",
    "version": "0.1.0",
    "name": "UpdatePasien",
    "group": "Pasien",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "id_pasien",
            "description": "<p>id pasien</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "nama",
            "description": "<p>nama pasien</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "username",
            "description": "<p>username pasien</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>email pasien</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>password pasien</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "tanggal_lahir",
            "description": "<p>tanggal lahir pasien (yyyy-mm-dd)</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "data.gender",
            "description": "<p>jenis kelamin pasien (l = laki-laki, p = perempuan)</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "data.id_dokter",
            "description": "<p>id dokter</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>success</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "pesan",
            "description": "<p>pesan</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Pasien.php",
    "groupTitle": "Pasien"
  },
  {
    "type": "post",
    "url": "/Pasien/upload/:id",
    "title": "upload foto pasien",
    "version": "0.1.0",
    "name": "UploadFotoPasien",
    "group": "Pasien",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "File",
            "optional": false,
            "field": "file",
            "description": "<p>file foto pasien</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>success</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Pasien.php",
    "groupTitle": "Pasien"
  },
  {
    "type": "post",
    "url": "/Rekomendasi/delete",
    "title": "hapus rekomendasi",
    "version": "0.1.0",
    "name": "DeleteRekomendasi",
    "group": "Rekomendasi",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "id_rekomendasi",
            "description": "<p>id rekomendasi yang akan dihapus</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>success</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Rekomendasi.php",
    "groupTitle": "Rekomendasi"
  },
  {
    "type": "get",
    "url": "/Rekomendasi/",
    "title": "Request semua data rekomendasi",
    "version": "0.1.0",
    "name": "GetRekomendasi",
    "group": "Rekomendasi",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "data",
            "description": "<p>berisi data rekomendasi</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.id",
            "description": "<p>id rekomendasi</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.rekomendasi",
            "description": "<p>nama rekomendasi</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.id_derajat_cidera",
            "description": "<p>id derajat cidera</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nama",
            "description": "<p>nama derajat cidera</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.keterangan",
            "description": "<p>keterangan derajat cidera</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.min_nilai",
            "description": "<p>nilai minimum derajat cidera</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.max_nilai",
            "description": "<p>nilai maximum derajat cidera</p>"
          },
          {
            "group": "Success 200",
            "type": "Char",
            "optional": false,
            "field": "data.isactive",
            "description": "<p>status aktif (y) atau non aktif (n)</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "data.created",
            "description": "<p>waktu saat input data</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.createdby",
            "description": "<p>id user yang melakukan input data</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "data.updated",
            "description": "<p>waktu saat edit data</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.updatedby",
            "description": "<p>id user yang melakukan edit data</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.no",
            "description": "<p>nomor urut data</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.action",
            "description": "<p>tombol edit dan delete</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Rekomendasi.php",
    "groupTitle": "Rekomendasi"
  },
  {
    "type": "get",
    "url": "/Rekomendasi/:id",
    "title": "Request data rekomendasi berdasarkan id",
    "version": "0.1.0",
    "name": "GetRekomendasiById",
    "group": "Rekomendasi",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "data",
            "description": "<p>berisi data rekomendasi</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.id",
            "description": "<p>id rekomendasi</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.rekomendasi",
            "description": "<p>nama rekomendasi</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.id_derajat_cidera",
            "description": "<p>id derajat cidera</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nama",
            "description": "<p>nama derajat cidera</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.keterangan",
            "description": "<p>keterangan derajat cidera</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.min_nilai",
            "description": "<p>nilai minimum derajat cidera</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.max_nilai",
            "description": "<p>nilai maximum derajat cidera</p>"
          },
          {
            "group": "Success 200",
            "type": "Char",
            "optional": false,
            "field": "data.isactive",
            "description": "<p>status aktif (y) atau non aktif (n)</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "data.created",
            "description": "<p>waktu saat input data</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.createdby",
            "description": "<p>id user yang melakukan input data</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "data.updated",
            "description": "<p>waktu saat edit data</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.updatedby",
            "description": "<p>id user yang melakukan edit data</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.no",
            "description": "<p>nomor urut data</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.action",
            "description": "<p>tombol edit dan delete</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Rekomendasi.php",
    "groupTitle": "Rekomendasi"
  },
  {
    "type": "post",
    "url": "/Rekomendasi/insert",
    "title": "Create rekomendasi",
    "version": "0.1.0",
    "name": "PostRekomendasi",
    "group": "Rekomendasi",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "rekomendasi",
            "description": "<p>nama rekomendasi</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "id_derajat_cidera",
            "description": "<p>id derajat cidera</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>success</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Rekomendasi.php",
    "groupTitle": "Rekomendasi"
  },
  {
    "type": "post",
    "url": "/Rekomendasi/update",
    "title": "update rekomendasi",
    "version": "0.1.0",
    "name": "UpdateRekomendasi",
    "group": "Rekomendasi",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "id_rekomendasi",
            "description": "<p>id rekomendasi yang akan diupdate</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "rekomendasi",
            "description": "<p>nama rekomendasi</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "id_derajat_cidera",
            "description": "<p>id derajat cidera</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>success</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Rekomendasi.php",
    "groupTitle": "Rekomendasi"
  },
  {
    "type": "post",
    "url": "/Rumahsakit/delete",
    "title": "hapus data rumahsakit",
    "version": "0.1.0",
    "name": "DeleteRumahsakit",
    "group": "Rumahsakit",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "id",
            "description": "<p>id rumah sakit yang akan dihapus</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>success</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Rumahsakit.php",
    "groupTitle": "Rumahsakit"
  },
  {
    "type": "get",
    "url": "/Rumahsakit/",
    "title": "Request semua data rumah sakit",
    "version": "0.1.0",
    "name": "GetRumahsakit",
    "group": "Rumahsakit",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "data",
            "description": "<p>berisi data rumah sakit</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.id",
            "description": "<p>id rumah sakit</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nama",
            "description": "<p>nama rumah sakit</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.alamat",
            "description": "<p>alamat rumah sakit</p>"
          },
          {
            "group": "Success 200",
            "type": "Char",
            "optional": false,
            "field": "data.isactive",
            "description": "<p>status aktif (y) atau non aktif (n) rumah sakit</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "data.created",
            "description": "<p>waktu saat input data</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.createdby",
            "description": "<p>id user yang melakukan input data</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "data.updated",
            "description": "<p>waktu saat edit data</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.updatedby",
            "description": "<p>id user yang melakukan edit data</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.no",
            "description": "<p>nomor urut data</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.action",
            "description": "<p>tombol edit dan delete</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Rumahsakit.php",
    "groupTitle": "Rumahsakit"
  },
  {
    "type": "get",
    "url": "/Rumahsakit/:id",
    "title": "Request data rumah sakit berdasarkan id",
    "version": "0.1.0",
    "name": "GetRumahsakitById",
    "group": "Rumahsakit",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "data",
            "description": "<p>berisi data rumah sakit</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.id",
            "description": "<p>id rumah sakit</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nama",
            "description": "<p>nama rumah sakit</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.alamat",
            "description": "<p>alamat rumah sakit</p>"
          },
          {
            "group": "Success 200",
            "type": "Char",
            "optional": false,
            "field": "data.isactive",
            "description": "<p>status aktif (y) atau non aktif (n) rumah sakit</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "data.created",
            "description": "<p>waktu saat input data</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.createdby",
            "description": "<p>id user yang melakukan input data</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "data.updated",
            "description": "<p>waktu saat edit data</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.updatedby",
            "description": "<p>id user yang melakukan edit data</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Rumahsakit.php",
    "groupTitle": "Rumahsakit"
  },
  {
    "type": "post",
    "url": "/Rumahsakit/insert",
    "title": "Create rumahsakit",
    "version": "0.1.0",
    "name": "PostRumahsakit",
    "group": "Rumahsakit",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "nama",
            "description": "<p>nama rumah sakit</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "alamat",
            "description": "<p>alamat rumah sakit</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "telepon",
            "description": "<p>nomor telepon rumah sakit</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>success</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Rumahsakit.php",
    "groupTitle": "Rumahsakit"
  },
  {
    "type": "post",
    "url": "/Rumahsakit/update",
    "title": "update rumahsakit",
    "version": "0.1.0",
    "name": "UpdateRumahsakit",
    "group": "Rumahsakit",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "id",
            "description": "<p>id rumah sakit yang akan diupdate</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "nama",
            "description": "<p>nama rumah sakit</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "alamat",
            "description": "<p>alamat rumah sakit</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "telepon",
            "description": "<p>nomor telepon rumah sakit</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>success</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Rumahsakit.php",
    "groupTitle": "Rumahsakit"
  },
  {
    "type": "post",
    "url": "/Survey/delete",
    "title": "delete survey",
    "version": "0.1.0",
    "name": "DeleteSurvey",
    "group": "Survey",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "id_survey",
            "description": "<p>id survey</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>success</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "pesan",
            "description": "<p>pesan</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Survey.php",
    "groupTitle": "Survey"
  },
  {
    "type": "get",
    "url": "/Survey/alldatasurvey",
    "title": "Request semua data survey",
    "version": "0.1.0",
    "name": "GetAllDataSurvey",
    "group": "Survey",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>success</p>"
          },
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "data",
            "description": "<p>array data</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.id_survey",
            "description": "<p>id survey</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.id_user",
            "description": "<p>id user</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nama",
            "description": "<p>nama user</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.valid",
            "description": "<p>y = valid, n = not valid</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.tanggal",
            "description": "<p>tanggal survey (yyyy-mm-dd)</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.jam",
            "description": "<p>jam survey (hh:mm)</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Survey.php",
    "groupTitle": "Survey"
  },
  {
    "type": "get",
    "url": "/Survey/allsurvey",
    "title": "Request total data survey",
    "version": "0.1.0",
    "name": "GetAllSurvey",
    "group": "Survey",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>success</p>"
          },
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "data",
            "description": "<p>array data</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.total_survey",
            "description": "<p>id survey</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Survey.php",
    "groupTitle": "Survey"
  },
  {
    "type": "get",
    "url": "/Survey/detail/:id",
    "title": "Request detail jawaban by id survey",
    "version": "0.1.0",
    "name": "GetDetailBySurvey",
    "group": "Survey",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>success</p>"
          },
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "data",
            "description": "<p>array data</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.id_survey",
            "description": "<p>id survey</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.id_grading",
            "description": "<p>id grading</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nama_grading",
            "description": "<p>jawaban</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nama_parameter",
            "description": "<p>pertanyaan</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Survey.php",
    "groupTitle": "Survey"
  },
  {
    "type": "get",
    "url": "/Survey/filterData",
    "title": "Request semua data survey untuk filtering",
    "version": "0.1.0",
    "name": "GetFilterData",
    "group": "Survey",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>success</p>"
          },
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "data",
            "description": "<p>array data</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.id_survey",
            "description": "<p>id survey</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.id_user",
            "description": "<p>id user</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nama",
            "description": "<p>nama user</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.gender",
            "description": "<p>jenis kelamin</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.tahun",
            "description": "<p>tahun survey</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.usia",
            "description": "<p>usia user</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.nilai",
            "description": "<p>total nilai</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.derajat",
            "description": "<p>derajat cidera</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.valid",
            "description": "<p>y = valid, n = not valid</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.tanggal",
            "description": "<p>tanggal survey (yyyy-mm-dd)</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.jam",
            "description": "<p>jam survey (hh:mm:ss)</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.status",
            "description": "<p>status user (Dokter/Pasien)</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Survey.php",
    "groupTitle": "Survey"
  },
  {
    "type": "get",
    "url": "/Survey/pertanyaan/",
    "title": "Request data pertanyaan",
    "version": "0.1.0",
    "name": "GetPertanyaan",
    "group": "Survey",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "data",
            "description": "<p>berisi data pertanyaan</p>"
          },
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "data.kriteria",
            "description": "<p>berisi data kriteria</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.kriteria.id",
            "description": "<p>id kriteria</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.kriteria.nama",
            "description": "<p>nama kriteria</p>"
          },
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "data.kriteria.parameter",
            "description": "<p>berisi data parameter</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.kriteria.parameter.id",
            "description": "<p>id parameter</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.kriteria.parameter.nama",
            "description": "<p>nama parameter</p>"
          },
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "data.kriteria.parameter.grading",
            "description": "<p>berisi data grading</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.kriteria.parameter.grading.id",
            "description": "<p>id grading</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.kriteria.parameter.grading.nama",
            "description": "<p>nama grading</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.kriteria.parameter.grading.urut",
            "description": "<p>nomor urut</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Survey.php",
    "groupTitle": "Survey"
  },
  {
    "type": "get",
    "url": "/Survey/rekomendasi/:id",
    "title": "Request rekomendasi by id derajat cidera",
    "version": "0.1.0",
    "name": "GetRekomendasiById",
    "group": "Survey",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>success</p>"
          },
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "data",
            "description": "<p>array data</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.rekomendasi",
            "description": "<p>rekomendasi</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Survey.php",
    "groupTitle": "Survey"
  },
  {
    "type": "get",
    "url": "/Survey/skorderajat/:id",
    "title": "Request skor dan derajat berdasarkan id survey",
    "version": "0.1.0",
    "name": "GetSkorDerajatById",
    "group": "Survey",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>success</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "nilai",
            "description": "<p>nilai total dari survey</p>"
          },
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "derajat",
            "description": "<p>array derajat</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "derajat.id",
            "description": "<p>id derajat cidera</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "derajat.nama",
            "description": "<p>nama derajat cidera</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "derajat.keterangan",
            "description": "<p>keterangan derajat cidera</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Survey.php",
    "groupTitle": "Survey"
  },
  {
    "type": "get",
    "url": "/Survey/skorkriteria/:id",
    "title": "Request skor per kriteria berdasarkan id survey",
    "version": "0.1.0",
    "name": "GetSkorKriteriaById",
    "group": "Survey",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>success</p>"
          },
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "data",
            "description": "<p>array data</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.id",
            "description": "<p>id kriteria</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.nama",
            "description": "<p>nama kriteria</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.nilai",
            "description": "<p>skor kriteria</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Survey.php",
    "groupTitle": "Survey"
  },
  {
    "type": "get",
    "url": "/Survey/pasien/:id",
    "title": "Request survey by id pasien",
    "version": "0.1.0",
    "name": "GetSurveyByPasien",
    "group": "Survey",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>success</p>"
          },
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "data",
            "description": "<p>array data</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.id_survey",
            "description": "<p>id survey</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "data.id_user",
            "description": "<p>id user</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.valid",
            "description": "<p>y = valid, n = not valid</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.tanggal",
            "description": "<p>tanggal survey (yyyy-mm-dd)</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.jam",
            "description": "<p>jam survey (hh:mm)</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Survey.php",
    "groupTitle": "Survey"
  },
  {
    "type": "post",
    "url": "/Survey/insert",
    "title": "Insert jawaban",
    "version": "0.1.0",
    "name": "InsertPertanyaan",
    "group": "Survey",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String[]",
            "optional": false,
            "field": "grading",
            "description": "<p>data jawaban</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "grading.id_grading",
            "description": "<p>id grading</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Request-Example:",
          "content": "{\n     \"grading\":[\n         {\n             \"id_grading\":\"112\"\n         },\n         {\n             \"id_grading\":\"108\"\n         },\n         {\n             \"id_grading\":\"18\"\n         }\n     ]\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>success</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "nilai",
            "description": "<p>nilai total dari survey</p>"
          },
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "derajat",
            "description": "<p>arrat derajat</p>"
          },
          {
            "group": "Success 200",
            "type": "Integer",
            "optional": false,
            "field": "derajat.id",
            "description": "<p>id derajat cidera</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "derajat.nama",
            "description": "<p>nama derajat cidera</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "derajat.keterangan",
            "description": "<p>keterangan derajat cidera</p>"
          },
          {
            "group": "Success 200",
            "type": "String[]",
            "optional": false,
            "field": "rekomendasi",
            "description": "<p>array rekomendasi</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Survey.php",
    "groupTitle": "Survey"
  },
  {
    "type": "post",
    "url": "/Survey/setvalid",
    "title": "set validasi survey",
    "version": "0.1.0",
    "name": "SetValidSurvey",
    "group": "Survey",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "id_survey",
            "description": "<p>id survey</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "valid",
            "description": "<p>y / n</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>success</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "pesan",
            "description": "<p>pesan</p>"
          }
        ]
      }
    },
    "filename": "API/application/controllers/Survey.php",
    "groupTitle": "Survey"
  }
] });
