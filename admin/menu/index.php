<div class="menu mt-3 px-5">
   <h4 class="title-color rounded text-white py-1">Danh Mục</h4>
    <!-- Example single danger button -->
    <div class="py-2">
        <form action="" method="post" >
            <div class="row">
                <div class="col-sm-3">
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
            <div class="row m-3">
                <div class="col-sm-3">
                    <input type="text" class="form-control" name = "menuName" placeholder="Nội Dung">
                </div>
                <div class="col-sm-3">
                    <input type="text" class="form-control " name="menuUrl" placeholder="Url">
                </div>
                <div class="col-sm-3">
                    <input type="text" class="form-control  rounded-0" name="menuIcon" placeholder="Icon">
                </div>
                <div class="col-sm-1">
                    <button class="btn btn-success" name="addMenu">Thêm</button>
                </div>
            </div>
        </form>
    </div>
</div>