package com.senac.dispenser.domain.entity;

import jakarta.persistence.*;

@Entity
@Table(name = "produto")
public class Produto {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    @Column(name = "produto_tipo", unique = true, nullable = false)
    private Integer produtoTipo;

    @Column(name = "quantidade_ml")
    private Integer quantidadeMl;

    @Column(name = "maquina_codigo")
    private Integer maquinaCodigo;

    @Column(name = "produto_descricao", length = 50)
    private String produtoDescricao;

    @Column(name = "custo_ponto")
    private Integer custoPonto;

    @Column(name = "status_id", nullable = false)
    private Integer statusId = 1;

    // Getters e Setters

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public Integer getProdutoTipo() {
        return produtoTipo;
    }

    public void setProdutoTipo(Integer produtoTipo) {
        this.produtoTipo = produtoTipo;
    }

    public Integer getQuantidadeMl() {
        return quantidadeMl;
    }

    public void setQuantidadeMl(Integer quantidadeMl) {
        this.quantidadeMl = quantidadeMl;
    }

    public Integer getMaquinaCodigo() {
        return maquinaCodigo;
    }

    public void setMaquinaCodigo(Integer maquinaCodigo) {
        this.maquinaCodigo = maquinaCodigo;
    }

    public String getProdutoDescricao() {
        return produtoDescricao;
    }

    public void setProdutoDescricao(String produtoDescricao) {
        this.produtoDescricao = produtoDescricao;
    }

    public Integer getCustoPonto() {
        return custoPonto;
    }

    public void setCustoPonto(Integer custoPonto) {
        this.custoPonto = custoPonto;
    }

    public Integer getStatusId() {
        return statusId;
    }

    public void setStatusId(Integer statusId) {
        this.statusId = statusId;
    }
}
