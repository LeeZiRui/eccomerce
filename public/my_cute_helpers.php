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
    function carts($newItem = null){
        if ($newItem and $newItem['quantity'] and $newItem['product']){
            $carts = carts();
            $search = $carts->search(function ($item) use($newItem){
                return $item->product->id == $newItem['product']->id;
            });
            if ($search !== false){
                $carts[$search]->quantity+= $newItem['quantity'];
            }else{
                $carts->push($newItem);
            }
            session(['carts'=>json_encode($carts)]);
        }else{
            $temp = json_decode(session('carts','[]'));
            return  collect($temp);
        }
    }
}
