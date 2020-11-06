Projeto que consegue colcoar varios hosts num mesmo docker nginx



# WebTrack

Crie os hosts para o funcionamento do sistema

```sh
sudo echo "127.0.0.1 webtrack.local" | sudo tee -a /etc/hosts
```
 ```sh
 sudo echo "127.0.0.1 botwebtrack.local" | sudo tee -a /etc/hosts
 ```

Logs Dashboard
 ```sh
http://webtrack.local/log-viewer 
```
Horizon Dashboard
 ```sh
http://webtrack.local/horizon
```

Disparar os jobs, acesse esta rota
 ```sh
http://webtrack.local/q
```

Para instalar o banco
 ```sh
docker-compose exec app php artisan migrate
```

Para iniciar o woker
 ```sh
docker-compose exec app php artisan horizon
```



