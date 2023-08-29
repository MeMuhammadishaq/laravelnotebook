@include('header');
<h1 class="text-center">Read Your Data
    <a href="{{route('data')}}" class="btn btn-primary" style="margin:5px; float:left;">Back</a>
</h1>
 
<br>
<hr style="height: 30px">
.<div class="container">
    <div class="table-responsive">
        <ul class="text-center">
            <li>
                <h2 >{{ $reading->title }}</h2>
            </li>
                       <br><br><br><br>
            <li>
                <p style="font-size: 25px">{{ $reading->desc }}</p>
            </li>
        </ul>

        
       
        
    </div>
</div>
