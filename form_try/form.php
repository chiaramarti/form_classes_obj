<!-- 
Certamente! Questo codice PHP è un esempio di come utilizzare la programmazione orientata agli 
oggetti (OOP) per generare un modulo HTML dinamico.

Ecco i passaggi logici:

1.  Definizione della classe Form: Inizia definendo una classe chiamata Form. 
    Questa classe ha tre proprietà private: $action, $method, e $fields. 
    Queste proprietà rappresentano l'azione del modulo (dove inviare i dati), 
    il metodo di invio (POST o GET) e un array per memorizzare i campi del modulo.

2.  Costruttore della classe: Viene definito un costruttore per la classe Form, 
    che consente di specificare l'azione e il metodo del modulo. Se non vengono forniti valori, 
    vengono usati dei valori predefiniti (azione vuota e metodo POST).

3.  Metodo addField: Questo metodo consente di aggiungere campi al modulo. 
    Prende in input il nome del campo, il tipo di input (testo, email, ecc.), 
    l'etichetta del campo, il segnaposto e gli eventuali attributi aggiuntivi per il campo.

4.  Metodo generateForm: Questo metodo genera il codice HTML per il modulo utilizzando le 
    informazioni fornite. Crea un tag <form> con l'azione e il metodo specificati, quindi cicla 
    attraverso i campi definiti e li aggiunge al modulo con etichette, attributi e segnaposto appropriati.

5.  Codice HTML: Dopo la definizione della classe PHP, c'è del codice HTML che utilizza questa classe 
    per generare un modulo. Viene istanziata un'istanza della classe Form, vengono aggiunti alcuni 
    campi utilizzando il metodo addField, e infine viene generato e visualizzato il modulo utilizzando il metodo generateForm

programmazione orientata agli oggetti
    |
    |
    v
creare un componente riutilizzabile (il modulo) 
    |
    |
    v
utilizzare PHP per generare dinamicamente codice HTML 
basato su input e configurazioni specifiche. 

-->

<?php

class FormGenerator
{
    private $action;
    private $method;
    private $fields;

    public function __construct($action = '', $method = 'post')
    {
        $this->action = $action;
        $this->method = $method;
        $this->fields = [];
    }

    public function addField($name, $type = 'text', $label = '')
    {
        $this->fields[] = [
            'name' => $name,
            'type' => $type,
            'label' => $label
        ];
    }

    public function generateForm()
    {
        $html = '<form action="' . $this->action . '" method="' . $this->method . '">';

        foreach ($this->fields as $field) {
            $html .= '<div>';
            if (!empty($field['label'])) {
                $html .= '<label for="' . $field['name'] . '">' . $field['label'] . '</label>';
            }
            $html .= '<input type="' . $field['type'] . '" name="' . $field['name'] . '" id="' . $field['name'] . '" />';
            $html .= '</div>';
        }

        $html .= '<button type="submit">Invia</button>';
        $html .= '</form>';

        return $html;
    }
}

// Esempio di utilizzo:
$form = new FormGenerator('process.php', 'post');
$form->addField('name', 'text', 'Nome');
$form->addField('email', 'email', 'Email');
$form->addField('message', 'textarea', 'Messaggio');

echo $form->generateForm();
