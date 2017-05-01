<?php

interface Resposta {
    public function responde(Requisicao $req, Conta $conta);
    public function setProximo(Resposta $resposta);
}