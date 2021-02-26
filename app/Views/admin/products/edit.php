<?php includeWithVars(VIEWS.'/layouts/partials/admin/toolbar.php', [
    'url'=> "/admin/products",
    'label'=> "All Products",
    'title'=> "Edit Product"
]);?>

<div class="row g-3">
  <div class="col-12">
    <form class="needs-validation" novalidate method="POST" action="/admin/products/update" enctype="multipart/form-data">
      <input type="hidden" value="<?=$product->id?>" name="id">
        <div class="row g-3">
          <div class="col-12">
              <label class="form-label">Product name</label>
              <input type="text" class="form-control" placeholder="" value="<?=$product->name?>" required name="name">
              <div class="invalid-feedback">
                Valid name is required.
              </div>
          </div>

          <div class="col-12 form-group">
             <label for="price" class="control-label">Product Price</label>
             <input type="text" class="form-control" id="price" name="price" value="<?=$product->price?>">
          </div>

          <div class="col-md-6">
              <label for="brand" class="form-label">Brand</label>
              <select class="form-select" id="brand" name="brand_id" required>
                <?php if (is_array($brands)) : ?>
                <option value="">Choose...</option>
                <?php foreach ($brands as $brand): ?>
                   <option value="<?php echo $brand->id; ?>" <?php if($brand->id===$product->brand_id) echo "selected";?>>
                      <?php echo $brand->name; ?>
                   </option>
                <?php endforeach; ?>
               <?php endif; ?>
              </select>
              <div class="invalid-feedback">
                Please select a valid brand.
              </div>
            </div>

            <div class="col-md-6">
              <label for="category" class="form-label">Category</label>
              <select class="form-select" id="category" name="category_id" required>
                <option value="">Choose...</option>
                  <?php if (is_array($categories)) : ?>
                    <?php foreach ($categories as $category): ?>
                      <option value="<?php echo $category->id;?>" <?php if($category->id===$product->category_id) echo "selected";?>>
                        <?php echo $category->name; ?>
                      </option>
                    <?php endforeach; ?>
                  <?php endif; ?>
              </select>
              <div class="invalid-feedback">
                Please provide a valid category.
              </div>
            </div>

          <div class="col-12 mb-3">
            <div class="btn-group" role="group">
              <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off" name="status" <?php echo ($product->status==1)? 'checked': '' ?>>
              <label class="btn btn-outline-primary" for="btncheck1">Product Status Is Active?</label>

              <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off" name="is_new" <?php echo ($product->is_new==1)? 'checked': '' ?>>
              <label class="btn btn-outline-primary" for="btncheck2">Is New?</label>

              <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off" name="is_recommended" <?php echo ($product->is_recommended==1)? 'checked': '' ?>>
              <label class="btn btn-outline-primary" for="btncheck3">Is Recomended?</label>
            </div>
            
          </div>
        </div>

        <div class="col-12 content">
            <div class="box">
              <input type="file" name="image" id="picture" class="inputfile" multiple accept="image/*" />
              <label for="picture"><strong> Choose a file&hellip;</strong></label>
              
              <img src="<?=$product->image?>" id="pictureImg" width=400>
            </div>
          </div>

          <div class="col-12 mb-3">
              <label class="form-label">Product description</label>
              <textarea class="form-control" name="description" rows="3"><?=$product->description?></textarea>
          </div>
        </div>
        

        <hr class="my-4">

        <button class="w-100 btn btn-primary btn-lg" type="submit">Update Product</button>
    </form>
  </div>
</div>

<script>

  function readURL() {
          var pictureImg = document.getElementById("pictureImg");
          var input = document.getElementById("picture");
          if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
              pictureImg.src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
          }
  }

  document.querySelector('#picture').addEventListener('change',function(){
    readURL()
  });

</script>