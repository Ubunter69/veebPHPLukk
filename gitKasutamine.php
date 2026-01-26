<?php
echo "<h2>GIT käsud</h2>";
echo "<ol>";
echo "<li>Repo loomine</li>";
echo "<pre> git init</pre>";
?>

    <li>Konfigureerimine
        <pre>
    git --globaal --list
    git config --globaal user.name ""
    git config --globaal user.email ""
</pre>
    </li>
    <li>
<pre>
    ssh võti loomiseks:
    ida_rsa.pub on vaja lisada githubi nagu deploy key
    ssh-keyegen -o -t rsa -C "email@exmaple.com"
</pre>
        ida_rsa.pub on vaja lisada githubi nagu deploy key
    </li>
    <li>
        Jälgimise lisamine ja commit'i tegemine
        <pre>
        git status
        git add .
        git commit -a -m "kommitt"
        git push
    </pre>
    </li>
<?php
echo "<li>GITHUB projektiga sidumine</li>";