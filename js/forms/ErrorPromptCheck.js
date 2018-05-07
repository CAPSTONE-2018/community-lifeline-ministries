function ErrorPromptCheck() {
    if($('.is-invalid').is(':visible')){
        launchGenericRequiredInputsModal();
        return true;
    }
    else{
        return false;
    }
}