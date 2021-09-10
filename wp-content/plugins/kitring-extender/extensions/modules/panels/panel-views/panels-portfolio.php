<?php

$PortfolioTab = $adminPanel->createTab( array(
    'name' => 'Portfolio'
) );

$PortfolioTab->createOption( array(
    'name' => 'Set Page for Portfolio Archive',
    'id' => 'archive_portfolio_page',
    'type' => 'select-pages',
    'desc' => 'Select a page'
) );

$PortfolioTab->createOption( array(
    'type' => 'save',
) );