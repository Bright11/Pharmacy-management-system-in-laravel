@extends('include.master')

@section('content')
<div class="container-fluid mt-5">
    <section class="firstsection">
     <div class="row ftrow">
         <div class="col-md-8 ">
              <img src="img/m.png" class="img-fluid">
              <button class=" myshopetop">Vitamins & minerals good for your body</button>
         </div>
         <div class="col-md-4">
            <div class="row">
             <div class="col-md-12">
                 <img src="img/m.png" class="img-fluid">
                 <button class=" myshopetop">shope now</button>
             </div>
             <div class="col-md-12">
                 <img src="img/f2.jpg" class="img-fluid">
                 <div class="firsttopcontainer">
                     <p class="">sleep without fear of any cancer or heart faliour</p>
                 <button class="">shope now</button>
                 </div>
             </div>

            </div>
         </div>

    </section>
    <section class="second">
        <h1 class="what">What we do</h1>
<div class="whatwedo">
 <h1>premature ejaculation</h1>
 <h1>Body ordor</h1>
 <h1>Canceling</h1>
 <h1>Body Massage</h1>
</div>
    </section>
    <section class="medicine mt-5">
        <div class="row">
<div class="col-md-3 tside" style=" background-image: url('img/Banner.jpg');">
 <p>You always find good health with us</p>
 <hr>
 <p>Your health is your life</p>
 <br>
 <p>We gives you what your body need</p>
 <p>With us, your blood is alway pure</p>
 <p>Talk to us and we will talk to your body</p>
</div>
<div class="col-md-9 mt-2 ml-1">
 <div class="row homepro">
        @forelse ($pro as $item)
        <div class="col-md-4 imgbox">

            <a href="/details/{{ $item->id }}">
                <img src="{{ asset('productimg/'.$item->image) }}"  class="img-fluid"/>
            <div class="icons">
                <h1>Sales</h1>
            </div>
            <div class="holders">
                <h1>Product name</h1>
                <div class="priceholdergrid">
                    <p>$1000</p>
                    <button>Add to cart</button>
                </div>
            </div>
            </a>

    </div>
        @empty

        @endforelse



 </div>
</div>

        </div>
    </section>
    <section class="coronavirous">
        <div class="row">
         <div class="col-md-6 myfirstr">
             <h1>Coronavirus - information
                 for pharmacy customers</h1>
                 <p>Keeping distance helps you to be corona free</p>
                 <p>Continue washing of hands</p>
                 <p>Stay hyginque and eat healthy food</p>
                 <p>Norse mask is alway good for you</p>
         </div>
         <div class="col-md-6 ">
             <img src="img/g.png"/>
         </div>
        </div>
    </section>
    </div>
@endsection
