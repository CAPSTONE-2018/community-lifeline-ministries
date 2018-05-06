function ErrorPromptCheck() {
    if($('.mdl-textfield__error').is(':visible')){
        launchGenericRequiredInputsModal();
        return true;
    }
    else{
        return false;
    }
}