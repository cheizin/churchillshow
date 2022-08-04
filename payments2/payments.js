function SelectPackage(id)
{
    if(id == '5') // means it is free
    {
        location.replace("https://churchill.potentialsoftwares.com/?trial_activated='true'");
    }
    else
    {
        form_url = 'PaymentsIframe.php';
        form_method = 'POST';
        form_data = {id:id};
    
        $.ajax({
            method:form_method,
            url: form_url,
            data: form_data,
            
            beforeSend: function()
            {
                
            },
            success: function(data)
            {
                $('#payments_section').html(data);
            },
            error: function(xhr)
            {
                
            }
        })
        
        
        
    }

}