<table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
    <!-- TABLE HEAD -->
    <thead>
        <tr>
            <th class="th-sm">Action
            </th>            
            <th class="th-sm">ID
            </th>
            <th class="th-sm">Cover
            </th>            
            <th class="th-sm">Name
            </th>
            <th class="th-sm">Author
            </th>
            <th class="th-sm">Description
            </th>
            <th class="th-sm">Genres
            </th>            
            <th class="th-sm">Status
            </th>            
            <th class="th-sm">Last Updated
            </th>            
        </tr>
    </thead>

    <!-- TABLE BODY -->
    <tbody>
        
        <?php foreach ($data["books"] as $book) { ?>
            <tr>
                <td><a href="https://ehosito.com/Admin/load/BookChapterManagement/<?php echo $book['id']; ?>" class="link-primary">Edit</a></td>
                <td><?php echo $book['id']; ?></td>
                <td><img src="<?php echo $book['cover']; ?>" class="img-thumbnail"></td>
                <td><?php echo $book['name']; ?></td>
                <td><?php echo $book['author']; ?></td>
                <td><?php echo $book['description']; ?></td>
                <td><?php echo $book['genres']; ?></td>
                <td><?php echo $book['status']; ?></td>
                <td><?php echo $book['last_updated']; ?></td>
            </tr>                
        <?php } ?>

    </tbody>

    <!-- TABLE FOOT -->
    <tfoot>
        <tr>
            <th>Action
            </th>            
            <th>ID
            </th>
            <th>Cover
            </th>            
            <th>Name
            </th>
            <th>Author
            </th>
            <th>Description
            </th>
            <th>Genres
            </th>            
            <th>Status
            </th>            
            <th>Last Update
            </th>            
        </tr>
    </tfoot>
</table>