
<div class="block background-white fullwidth">
    <div class="categories">
    @if(isset($categories))
        <ul>
            @foreach($categories as $category)
            <li>
                <a href="{{ url('c/'.$category->cat_slug) }}" class="categories-link"><i class="fa fa-bed"></i> {{ $category->cat_description }}</a>
                <ul>
                    @foreach($category->subcategories as $subcat)
                        <li><a href="{{ url('c/'.$category->cat_slug.'/'.$subcat->scat_slug) }}">{{ $subcat->scat_description }}</a>,</li>
                        
                    @endforeach
                        <li class="all"><a href="{{ url('c/'.$category->cat_slug) }}">View All <i class="fa fa-chevron-right"></i></a></li>
                </ul>
            </li>
            @endforeach
        </ul>        
    @endif
    </div><!-- /.categories -->
</div><!-- /.block -->