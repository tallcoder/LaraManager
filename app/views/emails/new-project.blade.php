<h3>New LaraManager Project</h3>
<p>Hello, this email is to inform you that $co has created your project {{ $p->name }}</p>
<p>If you would like to visit your project while it is in development, you may find it at {{ $p->url }}</p>
<p>Below is a summary of your project details:</p>

<ul>
<li>Name: {{ $p->name }}</li>
<li>Description: {{ $p->description }}</li>
<li>Budget: $ {{ $p->budget_total }}</li>
</ul>
<p>If you have any questions, feel free to contact us at {{ $ph }} or by email at {{ $em }}</p>