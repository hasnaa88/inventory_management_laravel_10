

    <!-- affichage de total des produit de  stock  -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                       TOTAL PRODUCTS</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalProducts }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-cart-arrow-down fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        total category of product</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalCategories}}</div>
                </div>
                <div class="col-auto">
                    
                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- affichage de total somme de stock -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        TOTAL SUM OF ALL PRODUCT</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">${{ $totalPrice }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        TOTAL customer</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalCustomers}}</div>
                </div>
                <div class="col-auto">
                    <i class="far fa-smile fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>







