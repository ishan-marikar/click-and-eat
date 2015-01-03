/**
 * Created by Ishan on 12/20/2014.
 */
$.fn.existsChecker = function() {
    return this.each(function() {
        var interval;
        $(this).on("keyup", function () {
            var self = $(this),
                selfType = self.data("type"),
                selfValue,
                feedback = ".check-exists-feedback[data-type=" + selfType + "]";
            if(interval === undefined)
            {
                interval = setInterval(function () {
                    if(selfValue !== self.val())
                    {
                        selfValue = self.val();
                        if(selfValue.length > 2)
                        {
                            $.ajax({
                                url:'../includes/verifyUser.php',
                                type:'get',
                                dataType:'json',
                                data: {
                                    type: selfType,
                                    value: selfValue
                                },
                                success: function(data)
                                {
                                    if(data.exists !== undefined)
                                    {
                                        if(data.exists === true)
                                        {
                                            feedback.text("Uh-oh. Seems like it's already taken.");
                                            $('#registerButton').disable();
                                            return false;
                                        }
                                        else if (data.exists == false){
                                            feedback.text("Looks good!");
                                            $('#registerButton').enable();
                                            return true;
                                        }
                                    }
                                },
                                error: function()
                                {
                                    //something went wrong
                                }
                            });
                        }
                    }
                }, 2000);
            }
        });
    });
};