<?php
if(! function_exists('filterByLinkQuery')){
    function filterByLinkQuery($link ,$key ,$value = ''){
        $data =  request()->all();
        $data[$key] = $value;
        $queryFilter = '';
        $count = 0;
        foreach ($data as $index => $item){
            $queryFilter .= ($count == 0 ? '?' :'&').$index.'='.$item;
            $count++;
        }
        return $link  .$queryFilter;
    }
}
if(! function_exists('filterActiveClass')){
    function filterActiveClass($class ,$key ,$value = ''){
        $data =  request()->all();
        if ($value == '' and  (! isset($data[$key]) or  $data[$key] == null or $data[$key] == '') ){
            return $class;
        }
        if(isset($data[$key]) and $data[$key] == $value)
            return $class;
        return '';
    }
}

if(! function_exists('carts')){
    function carts($newItem = null,$size = null,$color = null){
        if ($newItem and $newItem['quantity'] and $newItem['product']){
            $carts = carts();
            $search = $carts->search(function ($item) use($newItem,$size,$color){
                $con = $item->product->id == $newItem['product']->id;
//                dd(carts());
                if (isset($item->size))
                    $sameSize = $item->size == $size;
                else{
                    $sameSize = null == $size;
                }
                if (isset($item->color))
                    $sameColor = $item->color == $color;
                else{
                    $sameColor = null == $color;
                }
                return $con and $sameColor and $sameSize;
            });
            if ($search !== false){
                $carts[$search]->quantity+= $newItem['quantity'];
            }else{
                $newItem['color'] = $color;
                $newItem['size'] = $size;
                if (auth()->check())
                    $newItem['user_id'] = auth()->id();
                $carts->push($newItem);
            }
            session(['carts_'.auth()->id()=>json_encode($carts)]);
        }else{
            $temp = json_decode(session('carts_'.auth()->id(),'[]'));
            return  auth()->check() ? collect($temp)->where('user_id',auth()->id()) : collect($temp)->where('user_id',null);
        }
    }
}
if (! function_exists('cartsTotal')){
    function cartsTotal(){
        return carts()->sum(function ($item){
            return $item->quantity * $item->product->price;
        });
    }
}
