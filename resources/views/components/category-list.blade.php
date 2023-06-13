<div class="hero__categories">
    <div class="hero__categories__all">
        <i class="fa fa-bars"></i>
        <span>All departments</span>
    </div>
        <ul>
             @foreach($categories->where('parent_id',null) as $category)
                 <li><a href="#">{{$category->title}}</a>
                 @if($categories->where('parent_id',$category->id)->count())
                     <ul>
                         @foreach($categories->where('parent_id',$category->id) as $subCategory)
                              <li><a href="">{{$subCategory->title}}</a></li>
                         @endforeach
                     </ul>
                 @endif
                 </li>
             @endforeach
        </ul>
</div>



