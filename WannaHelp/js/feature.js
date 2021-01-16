function displaySearchText(){
    $(function(){
        var textToChange = $('#submit-btn');
        var name = $('#name').val();
        var judet = $('#regiune-text').val();
        
        if(name || judet) textToChange.val('Caută');
    
        else textToChange.val('Vezi tot');
    });
}