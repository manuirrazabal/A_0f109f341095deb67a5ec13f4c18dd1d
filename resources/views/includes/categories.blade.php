
<div class="block background-white fullwidth mt80 mb-80">
    <div class="categories">
    @if(isset($categories))
        <ul>
            @foreach($categories as $category)
            <li>
                <a href="#" class="categories-action">Submit</a>
                <a href="#" class="categories-link"><i class="fa fa-bed"></i> {{ $category->cat_description }}</a>
                <ul>
                    @foreach($category->subcategories as $subcat)
                        <li><a href="#">{{ $subcat->scat_description }}</a>,</li>
                        
                    @endforeach
                        <li class="all"><a href="#">View All <i class="fa fa-chevron-right"></i></a></li>
                </ul>
            </li>
            @endforeach
        </ul>        
    @endif
    </div><!-- /.categories -->
</div>