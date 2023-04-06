@extends('layouts.admin-layout')
@section('content')
    @php
        $user = Auth::user();
        
    @endphp
    <table id="table-key" style="width:100%; margin-bottom: 15px;">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Trạng thái</th>
            <th>Hành động</th>
        </tr>

    </table>
    {{-- modal create --}}
    <button id="myBtn">Tạo từ khóa</button>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <form action="" name="formCreate" onsubmit="return validateForm()" class="formCreate">
                <div class="form-group">
                    <label>Tên</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter name" />
                </div>
                <button type="submit" class="btn btn-primary">
                    Save
                </button>
            </form>
        </div>
    </div>
    {{-- end modal create --}}

    {{-- modal edit  --}}
    <div id="modalEdit" class="modal">
        <div class="modal-content">
            <span class="close1">&times;</span>
            <form action="" name="formEdit" onsubmit="return validateFormEdit()" class="formEdit">
                <div class="form-group">
                    <label>Tên</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter name" />
                </div>
                <button type="submit" class="btn btn-primary">
                    Save
                </button>
            </form>
        </div>
    </div>
    {{-- end modal edit  --}}
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .close1 {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close1:hover,
        .close1:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        table,
        th,
        td {
            border: 1px solid white;
        }

        .create-category {
            padding: 8px;
            margin-top: 8px;
            background: white;
            border-radius: 10px;
        }
    </style>
    <script>
        fetch("http://127.0.0.1:8000/api/list-key-word")
            .then((res) => res.json())
            .then((data) => {
                data.data.forEach((item) => {
                    renderKeys(item);
                });
            });

        const tableKey = document.querySelector("#table-key");
        const renderKeys = (item) => {
            const output = `
        <tr data-id ='${item.id}'>
                    <td>${item.id}</td>
                    <td>${item.name}</td>
                    <td>
                        ${item.status==0?'Đang hoạt động':'Dừng hoạt động'}
                        </td>
                    <td>
                        <a id="openModalEdit" class="btn-del btn btn-danger btn-sm"  onclick="detailKey(${item.id})">Sửa</a>
                        ${item.status==0?
                            '<a class="btn-del btn btn-danger btn-sm">Dừng hoạt động</a>':
                            '<a class="btn-del btn btn-danger btn-sm">Hoạt động</a>'
                        }
                    </td>
                </tr>
        `;
            tableKey.insertAdjacentHTML("beforeend", output);
        };

        // modal create
        var modal = document.getElementById("myModal");


        var btn = document.getElementById("myBtn");


        var span = document.getElementsByClassName("close")[0];


        btn.onclick = function() {
            modal.style.display = "block";
        }


        span.onclick = function() {
            modal.style.display = "none";
        }


        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        // end modal create

        // validate form create

        const addModalForm = document.querySelector(".formCreate");
        const editModalForm = document.querySelector("#modalEdit .formEdit ");

        function validateForm() {
            let x = document.forms["formCreate"]["name"].value;
            if (x == "") {
                alert("Nhập tên");
                return false;
            } else {
                fetch('http://127.0.0.1:8000/api/key/create', {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                        },
                        body: JSON.stringify({
                            name: addModalForm.name.value,
                            status: 0,
                        }),
                    })
                    .then((res) => res.json())
                    .then((data) => {
                        const dataArr = [];
                        dataArr.push(data);
                        renderUsers(dataArr);
                    });
            }
        }
        // end form create

        // edit key
        var modal1 = document.getElementById("modalEdit");


        var span1 = document.getElementsByClassName("close1")[0];


        span1.onclick = function() {
            editModalForm.name.value = "";
            modal1.style.display = "none";
        }


        window.onclick = function(event) {
            if (event.target == modal1) {
                modal1.style.display = "none";
            }
        }

        function detailKey(value) {
            modal1.style.display = "block";

            fetch(`http://127.0.0.1:8000/api/key/detail-key/${value}`)
                .then((res) => res.json())
                .then((data) => {
                    editModalForm.name.value = data.data.name;
                });
        }
        // end edit key
    </script>
@endsection
