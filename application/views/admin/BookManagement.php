<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Book Management</h1>
                </div>
                <div class="col-sm-6">
                    <!--<ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="#">Book</a></li>
                    </ol>-->
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="m-0">Book</h5>
                        </div>
                        <div class="card-body">
                            <table id="dtBasicExample" class="table table-bordered table-hover dataTable dtr-inline" cellspacing="0" width="100%">
                                <!-- TABLE HEAD -->
                                <thead>
                                    <tr>
                                        <th class="th-sm sorting">ID</th>
                                        <th class="th-sm sorting">Cover</th>
                                        <th class="th-sm sorting">Name</th>
                                        <th class="th-sm sorting">Author</th>
                                        <th class="th-sm sorting">Description</th>
                                        <th class="th-sm sorting">Genres</th>
                                        <th class="th-sm sorting">Status</th>
                                        <th class="th-sm sorting">Last Updated</th>
                                        <th class="th-sm">Action</th>                                        
                                    </tr>
                                </thead>

                                <!-- TABLE BODY -->
                                <tbody>

                                    <?php foreach ($data["books"] as $book) { ?>
                                        <tr>
                                            <td><?php echo $book['id']; ?></td>
                                            <td><img src="<?php echo $book['cover']; ?>" class="img-thumbnail"></td>
                                            <td><?php echo $book['name']; ?></td>
                                            <td><?php echo $book['author']; ?></td>
                                            <td><?php echo $book['description']; ?></td>
                                            <td><?php echo $book['genres']; ?></td>
                                            <td><?php echo $book['status']; ?></td>
                                            <td><?php echo $book['last_updated']; ?></td>
                                            <td><a href="<?php echo $GLOBALS['root_link']; ?>/Admin/load/BookChapterManagement/<?php echo $book['id']; ?>" class="link-primary">Edit</a></td>                                            
                                        </tr>                
                                    <?php } ?>

                                </tbody>

                            </table>
                        </div>
                    </div>              
                </div>

            </div>
        </div>

    </div>
</div>    
