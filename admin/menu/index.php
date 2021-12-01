<div class="menu mt-3 px-5">
    <h4 class="title-color rounded text-white py-1">Danh Mục</h4>
    <div class=" d-flex justify-content-center">
        <form action="" method="post">
            <div class="row">
                <div class="col-sm-9">
                    <select name="selectMenu" id="" class="form-select"> 
                        <option value="0">++ Danh mục mới ++</option>
                        <?php
                            $query = executeResult('select * from menu');
                            editMenu($query, 0, $EditnewMenu, '');
                            echo str_replace('<ul></ul>','',$EditnewMenu);
                        ?>
                    </select>
                </div>
                <div class="col-sm-1">
                    <button class="btn btn-danger" name="deleteMenu">Xoá</button>
                </div>
            </div>
            <div class="py-3">
                <div class="col-sm-12 py-2">
                    <input type="text" class="form-control" name = "menuName" placeholder="Nội Dung">
                </div>
                <div class="col-sm-12">
                    <input type="text" class="form-control " name="menuUrl" placeholder="Url">
                </div>
                <div class="col-sm-12 py-2">
                    <input type="text" class="form-control  rounded-0" name="menuIcon" placeholder="Icon">
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <button class="btn btn-success" name="addMenu">Thêm</button>
                    </div>
                    <div class="col-sm-3">
                        <button class="btn btn-warning" name="editMenu">Sửa</button>
                    </div>
                </div>
               
            </div>
        </form>
        
   </div>
   
</div>
