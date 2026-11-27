<?php 
// Constante qui dépendent de chaque projet et qui doivent être secrète
// DONC : il faut les placer en dehors du chemin du site Web
// Il faut apprendre
const HOTE = "db";
const UTIL = "teetim";
const MDP = "teetim";
const BD = "teetim";

function connexion() 
{
    $dsn = "mysql:host=".HOTE.";dbname=".BD.";charset=utf8mb4";
    return new PDO($dsn, UTIL, MDP, [
        PD::ATTR_ERRMODE => PDO::ERRMODE_SILENT,
        PD::ATTR_DEFAULT_FETCH_MODE => PDO::ERRMODE_SILENT,
    ])
}


function requete() 
{

} 

function creer() 
{

} 

function lire() 
{

} 

function modifier() 
{

} 

function supprimer() 
{

} 
?>