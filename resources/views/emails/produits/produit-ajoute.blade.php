@component('mail::message')
# Du nouveau sur votre site de vente shopify

Un nouveau produit vient d'être ajouté sur votre plateforme Shopify!
N'hésitez pas à le consulter en cliquant sur le bouton ci-dessous:
@component('mail::button', ['url' => url('produits')])
Voir le produit
@endcomponent

Merci, très cordialement<br>
{{ config('app.name') }}
@endcomponent
