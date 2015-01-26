/**
 * Created by Ishan on 12/20/2014.
 */
console.log("Exists checker is running");
$.fn.existsChecker = function() {
    return this.each(function() {
        var interval;
        $(this).on('keyup', function () {
            var self = $(this),
                selfType = self.data('type'),
                selfValue,
                feedback = $('.check-exists-feedback[data-type=' + selfType + ']');

            if(interval === undefined)
            {
                interval = setInterval(function(){
                    if(selfValue !== self.val())
                    {
                        selfValue = self.val();

                        if(selfValue.length > 2){
                            $.ajax({
                                url: './includes/userExists.php',
                                type: 'get',
                                dataType: 'json',
                                data:{
                                    type: selfType,
                                    value: selfValue
                                },
                                success: function (data) {
                                    if(data.exists !== undefined)
                                     {
                                        if(data.exists)
                                        {
                                            feedback.text("Uh oh. Seems like it's already used.");
                                        }
                                        else
                                        {
                                            feedback.text("Looks good!");
                                        }
                                     }
                                }
                                });
                        }
                    }
                }, 1500);
            }
        });
    });
};