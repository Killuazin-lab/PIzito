package com.senac.dispenser.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import com.senac.dispenser.domain.entity.Pedido;

@Repository
public interface PedidoRepository extends JpaRepository<Pedido, Long> {
}

