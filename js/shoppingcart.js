function validate()
{
    $quantity = $("form #quantity").val();
    alert($quantity);
    $return = true;
    if(!$quantity.isNumeric())
    {
        $return = false;
        alert("Quantity should be numeric!");
        $("#quantity").value = 1;
    }

    return $return;

}