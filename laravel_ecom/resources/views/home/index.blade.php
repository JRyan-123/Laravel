@extends('layouts.user')
@section('home')
  <main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Category</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Category</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <div class="container">
      <div class="row">

        <div class="col-lg-4 sidebar">

          <div class="widgets-container">

           

@livewire('filter-product')

           

            <!-- Pricing Range Widget -->
            <div class="pricing-range-widget widget-item">

              <h3 class="widget-title">Price Range</h3>

              <div class="price-range-container">
                <div class="current-range mb-3">
                  <span class="min-price">$0</span>
                  <span class="max-price float-end">$1000</span>
                </div>

                <div class="range-slider">
                  <div class="slider-track"></div>
                  <div class="slider-progress"></div>
                  <input type="range" class="min-range" min="0" max="1000" value="0" step="10">
                  <input type="range" class="max-range" min="0" max="1000" value="500" step="10">
                </div>

                <div class="price-inputs mt-3">
                  <div class="row g-2">
                    <div class="col-6">
                      <div class="input-group input-group-sm">
                        <span class="input-group-text">$</span>
                        <input type="number" class="form-control min-price-input" placeholder="Min" min="0" max="1000" value="0" step="10">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="input-group input-group-sm">
                        <span class="input-group-text">$</span>
                        <input type="number" class="form-control max-price-input" placeholder="Max" min="0" max="1000" value="500" step="10">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="filter-actions mt-3">
                  <button type="button" class="btn btn-sm btn-primary w-100">Apply Filter</button>
                </div>
              </div>

            </div><!--/Pricing Range Widget -->

       
        

           

          </div>

        </div>

        <div class="col-lg-8">

          <!-- Category Header Section -->
          <section id="category-header" class="category-header section">

            <div class="container" data-aos="fade-up">

              <!-- Filter and Sort Options -->
              <div class="filter-container mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="row g-3">
                  
       
                  <div class="col-12 col-md-6 col-lg-2">
                    <div class="filter-item">
                      <label for="sortBy" class="form-label">Sort By</label>
                      <select class="form-select" id="sortBy">
                        <option selected="">Featured</option>
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                        <option>Customer Rating</option>
                        <option>Newest Arrivals</option>
                      </select>
                    </div>
                  </div>

              </div>

            </div>

          </section><!-- /Category Header Section -->

          <!-- Category Product List Section -->
          <section id="category-product-list" class="category-product-list section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

             

               
              

              @livewire('list-product')

           

            </div>

          </section><!-- /Category Product List Section -->

          <!-- Category Pagination Section -->
    
        </div>

      </div>
    </div>

  </main>
  @endsection