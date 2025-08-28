<div class="row g-4">
    @forelse($products as $product)
    <div class="col-6 col-xl-4">
        <div class="product-card border shadow">
            <div class="product-image">
                <img src="{{ asset('storage/' . optional($product->images->get(0))->image_path ?? 'placeholder.jpg') }}" class="main-image img-fluid" alt="Product">
                <img src="{{ asset('storage/' . optional($product->images->get(1))->image_path ?? 'placeholder.jpg') }}" class="hover-image img-fluid" alt="Product Variant">
                <div class="product-overlay">
                    <div class="product-actions">
                        <button type="button" class="action-btn" data-bs-toggle="tooltip" title="Quick View">
                            <i class="bi bi-eye"></i>
                        </button>
                        <button type="button" class="action-btn" data-bs-toggle="tooltip" title="Add to Cart">
                            <i class="bi bi-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="product-details">
                <div class="product-category">{{ $product->category->category_name }}</div>
                <h4 class="product-title">
                    <a href="">{{ $product->product_name }}</a>
                </h4>
                <div class="product-meta">
                    <div class="product-price">₱{{ $product->regular_price }}</div>
                    <div class="product-rating">
                        <i class="bi bi-star-fill"></i>
                        4.8 <span>(42)</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12 text-center py-5">
        <p>No products found.</p>
    </div>
    @endforelse

    <div class="col-12 mt-4">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
</div>
