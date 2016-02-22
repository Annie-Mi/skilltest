@extends('home/layout/base')
@section('content')
<div class="content">
    <!-- contact form fields-->
   <div class="form">
   {!! Form::open(array('route' => 'senddata', 'class' => 'form')) !!}

   <div class="form">
       {!! Form::text('product_name', null, array('required', 'class'=>'form-group', 'size' => '50x50', 'placeholder'=>'Product name')) !!}
   </div>

   <div class="form">
       {!! Form::text('quantity', null, array('required', 'class'=>'form-group','size' => '50x50', 'placeholder'=>'Quantity in stock')) !!}
   </div>

   <div class="form">
       {!! Form::text('price', null, array('required', 'class'=>'form-group', 'size' => '50x50', 'placeholder'=>'Price per item')) !!}
   </div>

   <div class="form">
       {!! Form::submit('Send', array('class'=>'button')) !!}
   </div>
   {!! Form::close() !!}

                
    <div >
            @if (isset($products) == true)

            <br>
            <table>
                <tr>
                    <th style="width: 300px">Product name</th>
                    <th style="width: 300px">Quantity in stock</th>
                    <th style="width: 300px">Price per item</th>
                    <th style="width: 300px">Date</th>
                    <th ></th>
                </tr>
                <?php $i = 0;?>
                @foreach ($products as $all)
                <tr>
                    <td class="menulist" style="width: 300px"> {!! $all->product_name !!} </td>
                    <td class="menulist" style="width: 300px"> {!! $all->quantity !!} </td>
                    <td class="menulist" style="width: 300px"> {!! $all->price !!} </td>
                    <td class="menulist" style="width: 300px"> {!! $all->created_at !!} </td>
                </tr>
                <?php $i++;?>
                @endforeach
            </table>

            @endif

        </div>            
   </div>
@stop
