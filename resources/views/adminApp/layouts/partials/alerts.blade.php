{{-- CONTROL DE ERRORES Y MENSAJES FLASH --}}

@if(Session::has('flash'))

    @switch( Session::get('flash') )
    
        @case('error')                
            <x-css.alerta backColor="red" iconName="warning">
                {{ __('Error') }}
            </x-css.alerta>
            @break
    
        @case('insert')
            <x-css.alerta backColor="green" iconName="info">
                {{ __('Added correctly!') }}
            </x-css.alerta>
            @break

        @case('delete')
            <x-css.alerta backColor="orange" iconName="delete">
                {{ __('Deleted!') }}
            </x-css.alerta>
            @break
    
        @case('edit')
        <x-css.alerta backColor="green" iconName="edit">
            {{ __('Edited!') }}
        </x-css.alerta>
        @break
                
        @case('errorEdit')
            <x-css.alerta backColor="red" iconName="warning">
                {{ __('Error editing!') }}
            </x-css.alerta>
            @break

        @case('errorStore')
            <x-css.alerta backColor="red" iconName="warning" borderColor="red" borderStyle="dotted"  timeInTransition="750" timeOutTransition="750" >
                {{ __('Error adding') }}
            </x-css.alerta>
        @break

        @case('nothingEdit')
            <x-css.alerta backColor="orange" iconName="info" borderColor="orange" borderStyle="dotted"  timeInTransition="750" timeOutTransition="750" >
                {{ __('Nothing to edit!') }}
            </x-css.alerta>
            @break

        @case('emailSendError')
            <x-css.alerta backColor="red" iconName="warning" borderColor="red" borderStyle="dotted"  timeInTransition="750" timeOutTransition="750" >
                {{ __('Email send failed') }}
            </x-css.alerta>
        @break

        @case('zeroSearch')
            <x-css.alerta backColor="yellow" iconName="info" borderColor="red" borderStyle="dotted"  timeInTransition="750" timeOutTransition="750" >
                {{ __('No entries in the search') }}
            </x-css.alerta>
        @break

        @case('zeroResult')
            <x-css.alerta backColor="yellow" iconName="info" borderColor="red" borderStyle="dotted"  timeInTransition="750" timeOutTransition="750" >
                {{ __('No search results') }}
            </x-css.alerta>
        @break
            
        @case('errorSearch')
            <x-css.alerta backColor="red" iconName="warning" borderColor="red" borderStyle="dotted"  timeInTransition="750" timeOutTransition="750" >
                {{ __('Error Searching') }}
            </x-css.alerta>
        @break
            
        @case('Form_send')
            <x-css.alerta backColor="green" backColorStrong="500" iconName="info" borderColor="" borderStyle=""  timeInTransition="750" timeOutTransition="750" >
                {{ __('Form send') }}
            </x-css.alerta>
        @break
        
            
        @case('form_error')
            <x-css.alerta backColor="red" iconName="warning" borderColor="red" borderStyle=""  timeInTransition="750" timeOutTransition="750" >
                {{ __('Form send error') }}
            </x-css.alerta>
        @break
            
        @case('threadSend')
            <x-css.alerta backColor="green" backColorStrong="500" iconName="info" borderColor="" borderStyle=""  timeInTransition="750" timeOutTransition="750" >
                {{ __('Thread send') }}
            </x-css.alerta>
        @break
        
        
            
    @endswitch

@endif