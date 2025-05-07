package com.senac.dispenser.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import com.senac.dispenser.domain.entity.Cliente;

public interface ClienteRepository extends JpaRepository<Cliente, Integer> {
}
