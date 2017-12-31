    <!-- Add Category Modal  -->
    <div id="addCategoryModal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Category</h4>
          </div>
          <div class="modal-body">
            <form class="form-inline" action="index.php" method="post">
                <input type="text" placeholder="Category Name" required name="catgeory_name" class="form-control">
                <input type="submit" value="Add Category" class="btn btn-success">
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Update Category Modal  -->
    <div id="updateCategoryModal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Update Category</h4>
          </div>
          <div class="modal-body">
            <form class="form-inline" action="index.php" method="post">
                <input type="text" placeholder="Category Name" name="new_category_name" class="category-input-name form-control">
                <input type="hidden" name="id_category" class="category-input-id form-control">
                <input type="submit" value="Update Category" class="btn btn-primary">
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    