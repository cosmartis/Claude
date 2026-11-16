<?php
/**
 * Styles complémentaires des pages commerciales (accueil, pages métiers).
 * S'appuie sur les variables du thème (--c-*). HTML uniquement.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<style>
.cx-bridge{display:block;text-align:center;margin:44px auto 0;color:var(--c-accent);font-weight:600;text-decoration:none}
.cx-bridge span{display:block;font-size:1.6rem;line-height:1.2;margin-top:4px}
.cx-grid3{display:grid;grid-template-columns:repeat(3,1fr);gap:24px}
@media (max-width:900px){.cx-grid3{grid-template-columns:1fr}}
.cx-grid3 .card h3{font-size:1.15rem}
.cx-proof{border:1px solid var(--c-accent);border-radius:var(--c-radius);padding:32px;background:var(--c-surface);max-width:860px;margin:0 auto}
.cx-proof p:last-child{margin-bottom:0}
.cx-single{max-width:520px;margin:0 auto}
.cx-faq{max-width:860px;margin:0 auto}
.cx-links{display:flex;gap:16px;justify-content:center;flex-wrap:wrap;margin-top:28px}
.cx-center{text-align:center}
.cx-note{max-width:760px;margin:28px auto 0;text-align:center;font-size:0.95rem}
</style>
