<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    @extends('layout')

    @section('content')
    <div class="container mb-5">
        <div class="row justify-content-center mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">Add Product</div>
                    <div class="card-body">
                        <form action="{{ route('add.product') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                             <div class="mb-3 row">
                                <label for="productId" class="col-sm-3 col-form-label">Product ID</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="productId" name="productId" placeholder="Product ID" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="prodectTitle" class="col-sm-3 col-form-label">Product Title</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="prodectTitle" name="prodectTitle" placeholder="Product Title" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="prodectImage" class="col-sm-3 col-form-label">Product Image</label>
                                {{-- <div class="col-sm-9">
                                    <input type="text" class="form-control" id="prodectImage" name="prodectImage" placeholder="Product Image" required>
                                </div> --}}

                                <div class="col-sm-9">
                                    <input type="file" id="prodectImage" name="prodectImage" class="form-control" required>
                                   
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="prodectImage1" class="col-sm-3 col-form-label">Product Image 1</label>
                               <div class="col-sm-9">
                                    <input type="file" id="prodectImage1" name="prodectImage1" class="form-control">
                                   
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="prodectImage2" class="col-sm-3 col-form-label">Product Image 2</label>
                               
                                <div class="col-sm-9">
                                    <input type="file" id="prodectImage2" name="prodectImage2" class="form-control">
                                </div>
                            </div>
                                {{--  --}}
                                <div class="mb-3 row">
                                    <label for="prodectImage3" class="col-sm-3 col-form-label">Product Image 3</label>
                                <div class="col-sm-9">
                                    <input type="file" id="ProdectImage3" name="ProdectImage3" class="form-control">
                                </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="prodectImage4" class="col-sm-3 col-form-label">Product Image 4</label>
                                <div class="col-sm-9">
                                    <input type="file" id="ProdectImage4" name="ProdectImage4" class="form-control">
                                </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="prodectImage5" class="col-sm-3 col-form-label">Product Image 5</label>
                                <div class="col-sm-9">
                                    <input type="file" id="ProdectImage5" name="ProdectImage5" class="form-control">
                                </div>
                               </div>
                               <div class="mb-3 row">
                                <label for="prodectImage6" class="col-sm-3 col-form-label">Product Image 6</label>
                                <div class="col-sm-9">
                                    <input type="file" id="ProdectImage6" name="ProdectImage6" class="form-control" >
                                </div>
                                 </div>
                                 <div class="mb-3 row">
                                    <label for="prodectImage7" class="col-sm-3 col-form-label">Product Image 7</label>
                                <div class="col-sm-9">
                                    <input type="file" id="ProdectImage7" name="ProdectImage7" class="form-control">
                                </div>
                            </div>
                                {{--  --}}
                            {{-- </div> --}}
                           {{--  --}}
                           {{-- <div class="mb-3 row">
                            <label for="ProductDiscount" class="col-sm-3 col-form-label">ProductDiscount</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="ProductDiscount" name="ProductDiscount" placeholder="ProductDiscount" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="ProductMRPPrice" class="col-sm-3 col-form-label">ProductMRPPrice</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="ProductMRPPrice" name="ProductMRPPrice" placeholder="ProductMRPPrice" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="ProductDiscountPrice" class="col-sm-3 col-form-label">ProductDiscountPrice</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="ProductDiscountPrice" name="ProductDiscountPrice" placeholder="ProductDiscountPrice" required>
                            </div>
                        </div> --}}
                            {{--  --}}
                            <div class="mb-3 row">
                                <label for="productPrice" class="col-sm-3 col-form-label">Product Price</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="productPrice" name="productPrice" placeholder="Product Price" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="productShortDescription" class="col-sm-3 col-form-label">Short Description</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="productShortDescription" name="productShortDescription" placeholder="Short Description" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="productDescription" class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="productDescription" name="productDescription" placeholder="Description" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="productSKU" class="col-sm-3 col-form-label">Product SKU</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="productSKU" name="productSKU" placeholder="Product SKU" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="productApproval" class="col-sm-3 col-form-label">Product Approval</label>
                                <div class="col-sm-9">
                                    <select class="form-select" id="productApproval" name="productApproval" required>
                                        <option value="1">True</option>
                                        <option value="0">False</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="productInStock" class="col-sm-3 col-form-label">Product In Stock</label>
                                <div class="col-sm-9">
                                    <select class="form-select" id="productInStock" name="productInStock" required>
                                        <option value="yes">True</option>
                                        <option value="No">False</option>
                                    </select>
                                </div>
                            </div>
                            {{-- <div class="mb-3 row">
                                <label for="categoryId" class="col-sm-3 col-form-label">Category ID</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="categoryId" name="categoryId" placeholder="Category ID" required>
                                </div>
                            </div> --}}


                            
                            <div class="mb-3 row">
                                <label for="Category" class="col-sm-3 col-form-label">Category</label>
                                <div class="col-sm-9">
                                <select class="form-select" id="categoryId" name="categoryId" required>
                                    @foreach ($products as $product)
                                        <option value="{{ $product['categoryId'] }}">{{ $product['categoryName'] }}</option>
                                    @endforeach
                                </select>
                               </div>
                            </div>
                            {{--  --}}

                            <div class="mb-3 row">
                                <label for="vendorSubCategory" class="col-sm-3 col-form-label">vendor SubCategory</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="vendorSubCategory" name="vendorSubCategory" placeholder="vendorSubCategory" required>
                                </div>
                            </div>
                            {{--  --}}
                      
                            <div class="mb-3 row">
                                <label for="subCategory" class="col-sm-3 col-form-label">Sub Category</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="subCategory" name="subCategory" placeholder="Sub Category" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="productBrands" class="col-sm-3 col-form-label">Product Brands</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="productBrands" name="productBrands" placeholder="Product Brands" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="registerVendorUserId" class="col-sm-3 col-form-label">Register Vendor User ID</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="registerVendorUserId" name="registerVendorUserId" placeholder="Register Vendor User ID" required>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>
