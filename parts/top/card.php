<div class=" container mx-auto my-10 grid grid-cols-3 gap-4">
  <?php foreach (range(1, 3) as $key => $value) { ?>
    
    <div class="card bg-base-100 w-96 shadow-sm w-full">
      <figure>
        <img
          src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
          alt="Shoes" />
      </figure>
      <div class="card-body">
        <h2 class="card-title">Card Title</h2>
        <p>A card component has a figure, a body part, and inside body there are title and actions parts</p>
        <div class="card-actions justify-end">
          <button class="btn btn-primary">Buy Now</button>
        </div>
      </div>
    </div>

  <?php } ?>
</div>