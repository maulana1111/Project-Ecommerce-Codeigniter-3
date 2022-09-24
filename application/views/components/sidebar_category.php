<h5 class="bg-faded px-3 py-2 rounded">Kategori</h5>
<ul class="list-group">
	<?php foreach($this->category_m->get_all_category() as $category) { ?>
	    <li class="list-group-item">
	    	<a href="<?php echo site_url('product/category/'.$category->slug) ?>"><?php echo $category->category_name ?></a>
	    </li>
	<?php } ?>
</ul>