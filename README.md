# orcReturn
return more data on functions of php

#### difference from return array 
* you can use it as object too
* you can hide it from var_dump if you want
* you can set and get with just first letters like $obj->s or $obj->sASDASDASDAS captures first letter
* you can set value like array like $obj[0] 
* of course you can set it constructor like R(false,'data')

### How to use 
``` 
function your_custom_function() {
  return R(false,'data you want to return');
}

$result=your_custom_function();

if (!$result->s) exit($result->d); //this will print your data wanted to return
```

### Example
```
function areTheyEqual($a,$b) {
  if ($a==$b) {
    return R(true,'Yes They are');
  }else{
    return R(false,'No They aren\'t');
  }
}
$result=areTheyEqual(5,6);
echo $result->s; // false
echo $result->sAnyThingStartsWithS; // false
echo $result[0]; // false

echo $result->d; // No They aren't
echo $result->dAnyThingStartsWithD; // No They aren't
echo $result[1]; // No They aren't

var_dump($result); // [false,'No They aren\'t']

```


